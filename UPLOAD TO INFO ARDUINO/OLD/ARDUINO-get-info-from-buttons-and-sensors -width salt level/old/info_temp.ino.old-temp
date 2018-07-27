//for home temp

#include "DHT.h"
#define dht_apin A0 // Analog Pin sensor is connected to
 
dht DHT;

//for water temp 
const int sensor=A1; // Assigning analog pin A1 to variable 'sensor'
float tempc;  //variable to store temperature in degree Celsius
float tempf;  //variable to store temperature in Fahreinheit 
float vout;  //temporary variable to hold sensor reading


// for reading ports 
int ledPin = 13; // LED connected to digital pin 13
int inPin1 = 2;   
int inPin2 = 3;
int inPin3 = 4;
int inPin4 = 5;
int inPin5 = 6;
int inPin6 = 7;
int mainArray[6];
String command2 ;
int global_loop =0;


void setup()
{
pinMode(sensor,INPUT); // Configuring pin A1 as input
Serial.begin(9600);
// all ports
  pinMode(ledPin, OUTPUT);      // sets the digital pin 13 as output
  pinMode(inPin1, INPUT);      // sets the digital pin 7 as input
  pinMode(inPin2, INPUT);
  pinMode(inPin3, INPUT);
  pinMode(inPin4, INPUT);
  pinMode(inPin5, INPUT);
  pinMode(inPin6, INPUT);
         //  setup serial

}
void loop() 
{


 //printArray(mainArray);// get the first values of the ports in load the page 
 //getTemp();// get the value of temp in load of page
  
      
       if(Serial.available()) // only if i receve string from r pi inter the if
        {

          //Serial.println('boaz harar');
          printArray(mainArray);    
          getTemp();
          
        } 
     
}



  void getTemp()
  {
    vout=analogRead(sensor);
    vout=(vout*500)/1023;
    tempc=vout; // Storing value in Degree Celsius
    Serial.print("water_temp=");
   // Serial.print("\t");
    Serial.print(tempc);
   // Serial.println();
    delay(1000); //Delay of 1 second for ease of viewing 
    

    DHT.read11(dht_apin);
    Serial.print("home_humidity=");
    Serial.print(DHT.humidity);
   // Serial.print("%  ");
    Serial.print("home_temperature=");
    Serial.print(DHT.temperature); 
    //Serial.println("C  ");
   Serial.println("");
    
    //delay(5000);//Wait 5 seconds before accessing sensor again.
  }


void printArray(int mainArray[])
{
global_loop++;
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


