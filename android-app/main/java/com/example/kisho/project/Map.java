package com.example.kisho.project;

import android.content.Intent;
import android.content.SharedPreferences;
import android.net.Uri;
import android.os.AsyncTask;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;
import java.nio.Buffer;
import java.util.HashMap;

public class Map extends AppCompatActivity {

    EditText etLat,etLong;
    Button btnLoc;
    String json_location = "";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_map);
        btnLoc = (Button)findViewById(R.id.btnLoc);



        btnLoc.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                new Bg().execute();
            }
        });




    }


    class Bg extends AsyncTask<Void,Void,String>{
        String json_url;

        @Override
        protected void onPreExecute() {
            json_url = "http://192.168.1.102/MyProject/get_data.php";
        }

        @Override
        protected String doInBackground(Void... voids) {
            try {
                URL url = new URL(json_url);
                HttpURLConnection httpUrlConnection = (HttpURLConnection)url.openConnection();
                InputStream is = httpUrlConnection.getInputStream();
                BufferedReader br = new BufferedReader(new InputStreamReader(is));
                json_location = br.readLine();
                br.close();
                is.close();
                httpUrlConnection.disconnect();
                return json_location;

            } catch (MalformedURLException e) {
                e.printStackTrace();
            } catch (IOException e) {
                e.printStackTrace();
            }

            return null;
        }

        @Override
        protected void onProgressUpdate(Void... values) {
            super.onProgressUpdate(values);
        }

        @Override
        protected void onPostExecute(String result) {
            Toast.makeText(Map.this, result, Toast.LENGTH_SHORT).show();
            String[] split = result.split("\\s");
            Intent i = new Intent(Intent.ACTION_VIEW);
            i.setData(Uri.parse("geo:0,0?q="+split[0]+","+split[1]));
            startActivity(i);
        }
    }

}















