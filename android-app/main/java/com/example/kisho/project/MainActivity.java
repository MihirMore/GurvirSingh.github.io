package com.example.kisho.project;

import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.content.pm.ActivityInfo;
import android.net.Uri;
import android.os.AsyncTask;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.w3c.dom.Text;

import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.io.OutputStreamWriter;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;
import java.net.URLEncoder;
import java.util.HashMap;
import java.util.Map;

public class MainActivity extends AppCompatActivity {

    EditText etPhone,etPassword;
    Button btnLogin,btnRegister;
    SharedPreferences sp1;
    TextView tvRegister,tvForgotPassword;
    String name = "";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        int o = ActivityInfo.SCREEN_ORIENTATION_PORTRAIT;
        setRequestedOrientation(o);

        etPhone = (EditText)findViewById(R.id.etPhone);
        etPassword = (EditText)findViewById(R.id.etPassword);
        btnLogin = (Button)findViewById(R.id.btnLogin);
        //btnRegister = (Button)findViewById(R.id.btnRegister);
        sp1 = getSharedPreferences("Myp1",MODE_PRIVATE);
        tvRegister = (TextView)findViewById(R.id.tvRegister);
        tvForgotPassword = (TextView)findViewById(R.id.tvForgetPassword);

        if(!sp1.getString("name","").equals("")) {
            Intent i = new Intent(MainActivity.this,Dashboard.class);
            startActivity(i);
            finish();
        }else{

         btnLogin.setOnClickListener(new View.OnClickListener() {
             @Override
             public void onClick(View view) {
                 String s1 = etPhone.getText().toString();
                 String s2 = etPassword.getText().toString();
                 if(s1.length() != 10){
                     etPhone.setError("Please enter number");
                     etPhone.setText("");
                     etPhone.requestFocus();
                 }else if(s2.length() == 0){
                     etPassword.setError("Please enter password");
                     etPassword.setText("");
                     etPassword.requestFocus();
                 }

                 onlogin();
             }
         });

        tvRegister.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent i = new Intent(getApplicationContext(),Register.class);
                startActivity(i);


            }
        });

        tvForgotPassword.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent i = new Intent(Intent.ACTION_VIEW);
                i.setData(Uri.parse("https://"+"www.kgmsecurity.tech/mail.php"));
                startActivity(i);

            }
        });
    }}

    public void onlogin(){

        String uname = etPhone.getText().toString();
        String pass = etPassword.getText().toString();

        StringRequest request = new StringRequest(Request.Method.POST, "https://www.kgmsecurity.tech/login_a.php", new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
               if(response.toString()!=null){
                   name = response.toString();
                   SharedPreferences.Editor editor = sp1.edit();
                   editor.putString("name",name);
                   editor.commit();
                   editor.apply();
                   Intent i = new Intent(getApplicationContext(),Dashboard.class);
                   startActivity(i);
                   finish();
                }else{
                    Toast.makeText(MainActivity.this, "Wrong mobile number or password.", Toast.LENGTH_SHORT).show();
                }
            }
        },new Response.ErrorListener(){

            @Override
            public void onErrorResponse(VolleyError error) {

            }
        }){
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String,String> parameters = new HashMap<String, String>();
                parameters.put("uname",etPhone.getText().toString());
                parameters.put("pass",etPassword.getText().toString());

                return parameters;
            }
        };
        Volley.newRequestQueue(this).add(request);
    }
}

