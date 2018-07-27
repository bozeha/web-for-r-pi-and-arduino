//for home temp

#include "DHT.h"
#define dht_apin A0 // Analog Pin sensor is connected to
 
dht DHT;

//for water temp 
// LM35 temp sensor connected to analogue input A1, +5volt and ground

unsigned int total; // A/D readings
float tempc; // Celcius
float tempf; // Fahrenheit




// for reading ports 
int ledPin = 13; // LED connected to digital pin 13
int inPin1 = 2;   
int inPin2 = 3;
int inPin3 = 4;
int inPin4 = 5;
int inPin5 = 6;
int inPin6 = 7;
int inPin7 = 9;// ultrasonic
int outPin8 = 8;// ultrasonic
int mainArray[6];
String command2 ;
int global_loop =0;

int ultra_number=0;

void setup()
{

// for water sensor a1 analog input
  analogReference(INTERNAL); // use the internal ~1.1volt Aref | change to (INTERNAL1V1) for a Mega
Serial.begin(9600);
// all ports
  pinMode(ledPin, OUTPUT);      // sets the digital pin 13 as output
  pinMode(inPin1, INPUT);      // sets the digital pin 7 as input
  pinMode(inPin2, INPUT);
  pinMode(inPin3, INPUT);
  pinMode(inPin4, INPUT);
  pinMode(inPin5, INPUT);
  pinMode(inPin6, INPUT);
  pinMode(inPin7,INPUT);//ultrasonic 
  pinMode(outPin8,OUTPUT);//ultrasonic

         //  setup serial

}
void loop() 
{


      
       if(Serial.available()) // only if i receve string from r pi inter the if
        {

          //Serial.println('boaz harar');
          printArray(mainArray);    
          getSalinity();
          getTemp();
          
          
        } 
     
}
void getSalinity()
{

  pinMode(inPin7,INPUT);//determine the dis_in (pin 11) as the input from the sensor 
  pinMode(outPin8,OUTPUT);// determin the dis_out (pin 10) as the output to the sensor 
  digitalWrite(inPin7,LOW);//send low ping to sensor /for start the sensor (cycle for turn on sensor = low high low )
  delayMicroseconds(2);
  digitalWrite(outPin8,HIGH);//send heigh ping to sensor /for start the sensor (cycle for turn on sensor = low high low )
  delayMicroseconds(10);
   digitalWrite(outPin8,LOW);//send low ping to sensor /for start the sensor (cycle for turn on sensor = low high low )

ultra_number=  pulseIn(inPin7,HIGH);// get the sensor pulse (get the destination from sensor to object ->back and forth in feet)

ultra_number=ultra_number/2;//cancel back and forth -> convert to only one way 
ultra_number=ultra_number/3.01;//convert from feet to cm  (1 feet = 30.1 cm )
Serial.print("Salinity=");
Serial.print(ultra_number);//print to echo the destination in cm 


}


  void getTemp()
  {
//water temp 


total = 0; // reset total
  for (int x = 0; x < 64; x++) { // 64(max) analogue readings for averaging
    total += analogRead(A1); // add each value
  }
  tempc = total * 0.001632; // Calibrate by changing the last digit(s)
  //tempf = tempC * 1.8 + 32.0; // Celcius to Fahrenheit

  Serial.print("water_temp=");
  Serial.print(tempc, 2); // one decimal place
  
    delay(1000); //Delay of 1 second for ease of viewing 
    // end water temp 





    DHT.read11(dht_apin);
    Serial.print("home_humidity=");
    Serial.print(DHT.humidity);
   // Serial.print("%  ");
    Serial.print("home_temperature=");
    Serial.print(DHT.temperature); 
    //Serial.println("C  ");
   Serial.println("");
    
    
  }


void printArray(int mainArray[])
{
global_loop++;

///// get what of the gates are open and what close  1-6 
for(int lop=0;lop!=6;lop++)
{
  mainArray[lop]=0;
}
  mainArray[0] = digitalRead(inPin1);   // read the input pin
  mainArray[1] = digitalRead(inPin2);   // read the input pin
  mainArray[2] = digitalRead(inPin3);   // read the input pin
  mainArray[3] = digitalRead(inPin4);   // read the input pin
  mainArray[4] = digitalRead(inPin5);   // read the input pin
  mainArray[5] = digitalRead(inPin6);   // read the input pin



 
  Serial.print("start");
  Serial.print(mainArray[0]);
  Serial.print(mainArray[1]);
  Serial.print(mainArray[2]);
  Serial.print(mainArray[3]);
  Serial.print(mainArray[4]);
  Serial.print(mainArray[5]);
  Serial.print("end");
 // Serial.print(global_loop);
  //Serial.println();
}




