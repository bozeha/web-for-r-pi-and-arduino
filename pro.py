import os
os.system("sudo find /var/www -type d -exec chmod 755 {} \;")
os.system("sudo find /var/www -type f -exec chmod 666 {} \;")