cd ..

# =====================================
# Automatically update the repo
# =====================================
echo "Updating repository..."
git pull
echo ""


# =====================================
# Automatically set up submodules
# =====================================
echo "Cloning dependencies..."
git submodule init
git submodule update
echo ""


# =====================================
# Checking out latest WordPress
# =====================================
echo "===--===--==--==--==--=="
echo "=== Checking out latest WordPress"
echo "===--===--==--==--==--=="

if ( Test-Path "www/wp" ) {
	svn up www/wp
} else {
	mkdir -p www/wp
	svn co http://core.svn.wordpress.org/trunk/ www/wp
}
echo ""


# =====================================
# Checkout the VIP shared plugins repo
# =====================================
echo "===--===--==--==--==--=="
echo "=== Setting up VIP Shared plugins"
echo "===--===--==--==--==--=="

if ( Test-Path "www/wp-content/themes/vip" ) {
	svn up www/wp-content/themes/vip/plugins
} else {
	mkdir -p www/wp-content/themes/vip
	svn co https://vip-svn.wordpress.com/plugins/ www/wp-content/themes/vip/plugins
}
echo ""


# =====================================
# Start the VM (always provision, even if it's already running)
# =====================================
echo "===--===--==--==--==--=="
echo "=== Setting up the VM"
echo "===--===--==--==--==--=="

vagrant up --no-provision
vagrant provision
echo ""


# =====================================
# Add vip.dev entry to hosts file
# =====================================
echo "===--===--==--==--==--=="
echo "=== Configuring the hosts file"
echo "===--===--==--==--==--=="

$file = Join-Path -Path $env:WINDIR -ChildPath "system32\drivers\etc\hosts"

if ( -not ( Get-Content $file | Select-String vip.dev ) ) {
	$data = Get-Content $file
	$data += ""
	$data += "# VIP Quickstart"
	$data += "10.86.73.80 vip.dev"
	Set-Content -Value $data -Path $file -Force -Encoding ASCII
}
echo ""


# =====================================
# Outro/next steps
# =====================================
echo "===--===--==--==--==--=="
echo "=== Next Steps"
echo "===--===--==--==--==--=="
echo "* Go to http://vip.dev in your browser"
echo ""