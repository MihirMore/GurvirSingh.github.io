package com.example.kisho.project;

import android.content.DialogInterface;
import android.content.Intent;
import android.content.SharedPreferences;
import android.content.pm.ActivityInfo;
import android.net.Uri;
import android.os.AsyncTask;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.MenuItem;
import android.view.View;
import android.widget.ImageButton;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;

public class Dashboard extends AppCompatActivity {

    private static final int IMAGE_PICKER = 00;
    TextView tvName;
    SharedPreferences sp1;
    ImageButton ivSetting,ivDocumnet,ivMap,ivAlert,ivAbout,ivMaintenance;
    ImageView ivPerson;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_dashboard);

        int o = ActivityInfo.SCREEN_ORIENTATION_PORTRAIT;
        setRequestedOrientation(o);

        tvName = (TextView)findViewById(R.id.tvName);
        sp1 = getSharedPreferences("Myp1",MODE_PRIVATE);
        ivSetting = (ImageButton)findViewById(R.id.ivSetting);
        ivDocumnet = (ImageButton)findViewById(R.id.ivDocument);
        ivMap = (ImageButton)findViewById(R.id.ivMap);
        ivPerson = (ImageView) findViewById(R.id.ivPerson);
        ivAlert = (ImageButton)findViewById(R.id.ivAlert);
        ivAbout = (ImageButton)findViewById(R.id.ivAbout);
        ivMaintenance = (ImageButton)findViewById(R.id.ivMaintenance);

        String name = sp1.getString("name","");

      //  imageView dependence to be added "compile 'de.hdodenhof:circleimageview:2.1.0'"

       tvName.setText("Welcome "+name);
        ivPerson.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                OpenGallery();
            }
        });


        ivSetting.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

            }
        });

        ivDocumnet.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(Dashboard.this,GetDoc.class);
                startActivity(intent);
            }
        });

        ivMap.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                /*Intent intent = new Intent(Dashboard.this,Map.class);
                startActivity(intent);*/
                new Bg().execute();
            }
        });

        ivAlert.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(Dashboard.this,Attention.class);
                startActivity(intent);
            }
        });


        ivAbout.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent i = new Intent(Intent.ACTION_VIEW);
                i.setData(Uri.parse("http://"+"www.kgmsecurity.tech"));
                startActivity(i);
            }
        });

        ivMaintenance.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(Dashboard.this,DocList.class);
                startActivity(intent);
            }
        });
    }

    private void OpenGallery(){
        Intent getImageIntent = new Intent(Intent.ACTION_GET_CONTENT);
        getImageIntent .setType("image/*");
        startActivityForResult(getImageIntent , IMAGE_PICKER );
    }

    @Override
    public void onActivityResult(int requestCode, int resultCode, Intent data) {
        if (requestCode== IMAGE_PICKER  && resultCode == RESULT_OK) {
            Uri fullPhotoUri = data.getData();
            ivPerson.setImageURI(fullPhotoUri);
        }
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        MenuInflater me = getMenuInflater();
        me.inflate(R.menu.m1,menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {

        if(item.getItemId() == R.id.logout)
        {
            sp1.edit().remove("name").commit();
            Intent i = new Intent(getApplicationContext(),MainActivity.class);
            startActivity(i);
            finish();
        }
        return super.onOptionsItemSelected(item);
    }

    public void onBackPressed() {
        AlertDialog.Builder builder = new AlertDialog.Builder(this);
        builder.setMessage("Do you want to EXIT ?");
        builder.setCancelable(false);

        builder.setPositiveButton("Yes", new DialogInterface.OnClickListener() {
            @Override
            public void onClick(DialogInterface dialogInterface, int i) {
                finish();
            }
        });

        builder.setNegativeButton("No", new DialogInterface.OnClickListener() {
            @Override
            public void onClick(DialogInterface dialogInterface, int i) {
                dialogInterface.cancel();
            }
        });

        builder.setNeutralButton("Cancel", new DialogInterface.OnClickListener() {
            @Override
            public void onClick(DialogInterface dialogInterface, int i) {
                dialogInterface.cancel();
            }
        });

        AlertDialog alert = builder.create();
        alert.setTitle("EXIT");
        alert.show();

    }

    class Bg extends AsyncTask<Void,Void,String> {
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
                String json_location = br.readLine();
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
            Toast.makeText(Dashboard.this, result, Toast.LENGTH_SHORT).show();
            String[] split = result.split("\\s");
            Intent i = new Intent(Intent.ACTION_VIEW);
            i.setData(Uri.parse("geo:0,0?q="+split[0]+","+split[1]));
            startActivity(i);
        }
    }
}
