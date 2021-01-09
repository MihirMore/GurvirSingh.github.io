package com.example.kisho.project;

import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import java.util.ArrayList;
import java.util.Date;

public class Attention extends AppCompatActivity {

    Button btnSave;
    DbHandler db;
    String tp;
    TextView tvData,tvmessage;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_attention);

        db = new DbHandler(this);
        btnSave = (Button)findViewById(R.id.btnSave);
        tvData = (TextView)findViewById(R.id.tvData);
        tvmessage = (TextView)findViewById(R.id.tvmessage);

        Bundle extras = getIntent().getExtras();
        if (extras != null) {
            String address = extras.getString("MessageNumber");
            String message = extras.getString("Message");
            if(address.equals("+919137001033")){
                tvmessage.setText("Messsage : "+message);
                tp = message;
            }
            else{

            }
        }

        btnSave.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                String mes = tp;
                if(mes!=null){
                Date date = new Date();
                String d = String.valueOf(date);
                Alert s = new Alert(d,mes);
                db.save(s);}
            }
        });


        ArrayList<Alert> st = db.viewResult();
        if(st.size()==0) {
            tvData.setText("no records to show");
        }
        else {
            StringBuffer sb = new StringBuffer();
            for (Alert m : st) {
                sb.append( m.getDate() +"\n"+ m.getMessage() + "\n\n" );
                tvData.setText(sb.toString());
            }
        }
    }



}

class DbHandler extends SQLiteOpenHelper {

    SQLiteDatabase db;
    Context context;


    public DbHandler(Context context) {
        super(context, "alertdb", null, 1);
        this.context = context;
        db = this.getWritableDatabase();
    }

    @Override
    public void onCreate(SQLiteDatabase db) {

        db.execSQL("create table record(date text ,message varchar(50))");
    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int i, int i1) {
    }

    public void save(Alert s) {
        Toast.makeText(context,s.getDate()+""+s.getMessage(), Toast.LENGTH_SHORT).show();
        ContentValues c = new ContentValues();
        c.put("date",s.getDate());
        c.put("message",s.getMessage());
        long rid = db.insert("record",null,c);

        if( rid < 0 ) {
            Toast.makeText(context, " Issue in Saving ", Toast.LENGTH_SHORT).show();
        }
        else {
            Toast.makeText(context, " Record Saved ", Toast.LENGTH_SHORT).show();
        }
    }




    public ArrayList<Alert> viewResult() {
        Cursor c = db.query("record",null,null,null,null,null,null);
        c.moveToFirst();

        ArrayList<Alert> emp = new ArrayList<>();
        if(c.getCount() > 0) {
            do {
                String date = c.getString(0);
                String message = c.getString(1);
                Alert s = new Alert(date,message);
                emp.add(s);

            }while (c.moveToNext());


        }
        return emp;
    }
}

class Alert {

    private String date;
    private String message;



    public String getDate() {
        return date;
    }

    public String getMessage() { return message; };

    public Alert( String date,String message) {
        this.date = date;
        this.message = message;
    }

}








