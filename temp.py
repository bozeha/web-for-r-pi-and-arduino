import serial
ser = serial.Serial('/dev/arduino-input', 9600)
ser.write('temp')
read_serial2=ser.readline()
f = open('get_temp.php', 'w')
print >> f, "<?php echo '%s';?>" %read_serial2
f.close()
