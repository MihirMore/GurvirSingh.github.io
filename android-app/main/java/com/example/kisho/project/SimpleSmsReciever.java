package com.example.kisho.project;

import android.content.BroadcastReceiver;
import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.telephony.SmsMessage;
import android.widget.Toast;

/**
 * Created by kisho on 05/04/2019.
 */
public class SimpleSmsReciever extends BroadcastReceiver {

    private static final String TAG = "Message recieved";

    @Override

    public void onReceive(Context context, Intent intent) {
        Bundle pudsBundle = intent.getExtras();
        Object[] pdus = (Object[]) pudsBundle.get("pdus");
        SmsMessage messages = SmsMessage.createFromPdu((byte[]) pdus[0]);

        // Start Application's  MainActivty activity
        if(messages.getOriginatingAddress().equals("+919137001033")) {
            Intent smsIntent = new Intent(context, Attention.class);

            smsIntent.setFlags(Intent.FLAG_ACTIVITY_NEW_TASK);

            smsIntent.putExtra("MessageNumber", messages.getOriginatingAddress());

            smsIntent.putExtra("Message", messages.getMessageBody());

            context.startActivity(smsIntent);

            // Get the Sender Message : messages.getMessageBody()
            // Get the SenderNumber : messages.getOriginatingAddress()

            Toast.makeText(context, "SMS Received From :" + messages.getOriginatingAddress() + "\n" + messages.getMessageBody(), Toast.LENGTH_LONG).show();
        }

    }
}