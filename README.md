# twilioScreeningCalls
Creating a telephone call screening service using Twilio

The Call Flow

-Caller calls your Twilio Number. The agent will ask the caller to speak there name and record it. Then place the caller in enquene (Inbound Call)
-Using Twilio REST API initiate an (outbound call), from your Twilio Number to your personal phone number. Plays the recording, and presents you with the following options: 

Press 1 (DTMF) or Say Accept (SpeechResult)
-connects the call to Caller using Dial Queue Verbs
                  -OR-
Press 2  (DTMF)  or say Reject (SpeechResult)
->Using REST API we notify the caller and end the call enqueue and hang up our call


Uses TWIML API and Twilio Voice API PHP SDK

Uses Queue https://www.twilio.com/docs/voice/api/queue-resource  and EnQueue to place caller on hold. Could use Conference verb as well instead of Enqueue, just replace Enqueue with Conference for more options




Follow this wonderful guide to set up your free twilio account, get a phone number and your API SID and Token
https://www.twilio.com/docs/voice/quickstart/php

Dont forget to assign the webhook step1.xml (or if you use TWIMLBIN select the twimlbin URL)  to your twilio phone number 

Setting up a webserver isnt necessary. Use Twilios TWIMLBin for the XML files and "Functions" for the PHP files (convert logic to Javascript the IVR Menu example is a good starting blueprint) 
-I would suggest loading the XML files into TWIMLBIN let Twilio host the files so you dont have too, and if your capable Twilio Functions for the server side Code 



