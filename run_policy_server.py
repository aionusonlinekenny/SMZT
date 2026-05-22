"""
Flash Socket Policy Server
Run as Administrator: python run_policy_server.py
Keep this window open while playing the game.
"""
import socket
import threading

POLICY = (
    '<?xml version="1.0"?>\n'
    '<cross-domain-policy>\n'
    '<site-control permitted-cross-domain-policies="all"/>\n'
    '<allow-access-from domain="*" to-ports="*"/>\n'
    '</cross-domain-policy>\0'
).encode('utf-8')

def handle(conn):
    try:
        conn.settimeout(0.5)
        try:
            conn.recv(100)
        except:
            pass
        conn.sendall(POLICY)
    finally:
        conn.close()

def main():
    srv = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
    srv.setsockopt(socket.SOL_SOCKET, socket.SO_REUSEADDR, 1)
    try:
        srv.bind(('0.0.0.0', 843))
    except PermissionError:
        print("ERROR: Port 843 requires Administrator privileges.")
        print("Right-click CMD and choose 'Run as administrator', then run this script again.")
        input("Press Enter to exit...")
        return
    srv.listen(10)
    print("=====================================")
    print("Flash policy server running on port 843")
    print("Keep this window open while playing!")
    print("Press Ctrl+C to stop.")
    print("=====================================")
    while True:
        try:
            conn, _ = srv.accept()
            threading.Thread(target=handle, args=(conn,), daemon=True).start()
        except KeyboardInterrupt:
            print("\nStopped.")
            break

if __name__ == '__main__':
    main()
