import serial
ser = serial.Serial('/dev/arduino-input', 9600)
ser.write('info')