# Flash Socket Policy Server - Run as Administrator
# Right-click this file > "Run with PowerShell"
# Must stay open while playing the game.

$policy = "<?xml version=""1.0""?>`n<cross-domain-policy>`n<site-control permitted-cross-domain-policies=""all""/>`n<allow-access-from domain=""*"" to-ports=""*""/>`n</cross-domain-policy>`0"
$policyBytes = [System.Text.Encoding]::UTF8.GetBytes($policy)

try {
    $listener = New-Object System.Net.Sockets.TcpListener([System.Net.IPAddress]::Any, 843)
    $listener.Start()
    Write-Host "====================================="
    Write-Host "Flash policy server running on port 843"
    Write-Host "Keep this window open while playing!"
    Write-Host "Press Ctrl+C to stop."
    Write-Host "====================================="
    while ($true) {
        $client = $listener.AcceptTcpClient()
        try {
            $stream = $client.GetStream()
            $stream.ReadTimeout = 500
            $buf = New-Object byte[] 100
            try { $stream.Read($buf, 0, 100) | Out-Null } catch {}
            $stream.Write($policyBytes, 0, $policyBytes.Length)
            $stream.Flush()
        } finally {
            $client.Close()
        }
    }
} catch {
    Write-Host ""
    Write-Host "ERROR: $($_.Exception.Message)"
    Write-Host ""
    Write-Host "Port 843 requires Administrator. Please right-click the script and choose 'Run as Administrator'."
    Write-Host ""
    Write-Host "Press any key to exit..."
    $null = $Host.UI.RawUI.ReadKey("NoEcho,IncludeKeyDown")
}
