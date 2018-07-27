import serial, time
ser = serial.Serial('/dev/arduino-input', 9600, timeout=3)
time.sleep(2)
ser.write("i")
time.sleep(1)
read_serial=ser.readline()
f = open('get_info.php', 'w')
print >> f, "<?php echo '%s';?>" %read_serial
f.close()

'''
import serial , time
ser = serial.Serial('/dev/arduino-input', 9600, timeout=1)
ser.write('info')
time.sleep(0.5)
ser.readline()
'''