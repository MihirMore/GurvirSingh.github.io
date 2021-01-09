package com.example.kisho.project;

import android.content.Intent;
import android.content.SharedPreferences;
import android.content.pm.ActivityInfo;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.util.HashMap;
import java.util.Map;
import java.util.Random;

public class Register extends AppCompatActivity {

    EditText etName, etContact, etNumber, etPass, etEmail, etotp;
    Button btnOTP, btnDone;
    RequestQueue requestQueue;
    String insertUrl = "https://www.kgmsecurity.tech/insert.php";
    int ram;
    SharedPreferences sp1;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_register);

        int o = ActivityInfo.SCREEN_ORIENTATION_PORTRAIT;
        setRequestedOrientation(o);

        etName = (EditText) findViewById(R.id.etName);
        etContact = (EditText) findViewById(R.id.etContact);
        etNumber = (EditText) findViewById(R.id.etNumber);
        etPass = (EditText) findViewById(R.id.etPass);
        etotp = (EditText) findViewById(R.id.etotp);
        etEmail = (EditText)findViewById(R.id.etEmail);

        btnOTP = (Button) findViewById(R.id.btnOTP);
        btnDone = (Button) findViewById(R.id.btnDone);

        sp1 = getSharedPreferences("Myp1",MODE_PRIVATE);

        requestQueue = Volley.newRequestQueue(getApplicationContext());



        btnOTP.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                final String name = etName.getText().toString();
                final String phone = etContact.getText().toString();
                final String num = etNumber.getText().toString();
                final String pass = etPass.getText().toString();
                final String email = etEmail.getText().toString();
                if (name.length() == 0) {
                    etName.setError("Please enter name");
                    etName.setText("");
                    etName.requestFocus();
                } else if (phone.length() != 10) {
                    etContact.setError("Please enter number");
                    etContact.setText("");
                    etContact.requestFocus();
                } else if (num.length() == 0) {
                    etNumber.setError("Please enter number");
                    etNumber.setText("");
                    etNumber.requestFocus();
                } else if (pass.length() == 0) {
                    etPass.setError("Please enter password");
                    etPass.setText("");
                    etPass.requestFocus();
                } else if (email.length() == 0) {
                    etPass.setError("Please enter email");
                    etPass.setText("");
                    etPass.requestFocus();
                }

                Random n = new Random();
                ram = 99999+n.nextInt(999999);
                final String random = String.valueOf(ram);


                StringRequest request = new StringRequest(Request.Method.POST, insertUrl, new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {

                    }
                },new Response.ErrorListener(){

                    @Override
                    public void onErrorResponse(VolleyError error) {

                    }
                }){
                    @Override
                    protected Map<String, String> getParams() throws AuthFailureError {
                        Map<String,String> parameters = new HashMap<String, String>();
                        parameters.put("name",name);
                        parameters.put("email",email);
                        parameters.put("phone",phone);
                        parameters.put("num",num);
                        parameters.put("pass",pass);
                        parameters.put("otp",random);


                        return parameters;
                    }
                };

                requestQueue.add(request);

                Toast.makeText(Register.this, "Request Sent", Toast.LENGTH_SHORT).show();

            }
        });


        btnDone.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                String otp = etotp.getText().toString();
                int o = Integer.parseInt(otp);
                if(otp.length()==0){
                    etotp.setError("OTP Please");
                    etotp.setText("");
                    etotp.requestFocus();
                }
                if(ram==o){
                    final String name = etName.getText().toString();
                    final String phone = etContact.getText().toString();
                    final String num = etNumber.getText().toString();
                    final String pass = etPass.getText().toString();
                 /*   SharedPreferences.Editor editor = sp1.edit();
                    editor.putString("name",name);
                    editor.putString("phone", phone);
                    editor.putString("num", num);
                    editor.putString("pass", pass);
                    editor.commit();
                    editor.apply();*/
                    Toast.makeText(Register.this, "Registration Successfull", Toast.LENGTH_SHORT).show();
                    Intent i = new Intent(getApplicationContext(), MainActivity.class);
                finish();
                }
                else{
                    Toast.makeText(Register.this, "Error in registration", Toast.LENGTH_SHORT).show();
                }
            }
        });


    }



}
