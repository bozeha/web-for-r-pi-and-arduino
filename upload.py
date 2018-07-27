

import serial
#ser = serial.Serial('/dev/ttyUSB0', 9600)
ser = serial.Serial('/dev/arduino-output', 9600)
ser.write('upload')
