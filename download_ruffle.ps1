# Download Ruffle Flash emulator for SMZT game
# Run this script in PowerShell as Administrator
# Right-click > "Run with PowerShell"

$ErrorActionPreference = "Stop"

# Find the SmztWEB/SMZT directory
$scriptDir = Split-Path -Parent $MyInvocation.MyCommand.Path
$ruffleDir = Join-Path $scriptDir "SmztWEB\SMZT\ruffle"

Write-Host "Creating ruffle directory: $ruffleDir"
New-Item -ItemType Directory -Force -Path $ruffleDir | Out-Null

# Download latest Ruffle release for Windows
$apiUrl = "https://api.github.com/repos/ruffle-rs/ruffle/releases/latest"
Write-Host "Fetching latest Ruffle release info..."

try {
    $release = Invoke-RestMethod -Uri $apiUrl -UseBasicParsing
    $asset = $release.assets | Where-Object { $_.name -like "*selfhosted*windows*" -or $_.name -like "*web*" } | Select-Object -First 1

    if (-not $asset) {
        # Fallback: look for any selfhosted zip
        $asset = $release.assets | Where-Object { $_.name -like "*selfhosted*" } | Select-Object -First 1
    }

    if ($asset) {
        $zipPath = Join-Path $env:TEMP "ruffle.zip"
        Write-Host "Downloading: $($asset.name)"
        Invoke-WebRequest -Uri $asset.browser_download_url -OutFile $zipPath -UseBasicParsing

        Write-Host "Extracting to: $ruffleDir"
        Expand-Archive -Path $zipPath -DestinationPath $ruffleDir -Force
        Remove-Item $zipPath

        Write-Host ""
        Write-Host "SUCCESS! Ruffle installed to: $ruffleDir"
        Write-Host "Now refresh http://127.0.0.1:81/SMZT/client.html in your browser."
    } else {
        Write-Host "Could not find selfhosted asset. Trying direct download..."
        throw "Asset not found"
    }
} catch {
    Write-Host ""
    Write-Host "Auto-download failed. Please download manually:"
    Write-Host "1. Go to: https://github.com/ruffle-rs/ruffle/releases/latest"
    Write-Host "2. Download the file named 'ruffle-*-web-selfhosted.zip'"
    Write-Host "3. Extract ALL files into: $ruffleDir"
    Write-Host ""
    Write-Host "After extracting, the folder should contain ruffle.js"
}

Write-Host ""
Write-Host "Press any key to exit..."
$null = $Host.UI.RawUI.ReadKey("NoEcho,IncludeKeyDown")
