package com.example.kisho.project;

import android.Manifest;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.graphics.drawable.BitmapDrawable;
import android.net.Uri;
import android.support.annotation.NonNull;
import android.support.v4.app.ActivityCompat;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.Toast;

import java.io.ByteArrayOutputStream;
import java.io.FileNotFoundException;
import java.io.InputStream;



public class GetDoc extends AppCompatActivity {
    EditText etDoc,etValidity;
    ImageView ivImg;
    Button btnSave,btnChoose;
    SQLiteHelper db;

    final int REQUEST_CODE_GALLERY = 999;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_get_doc);

        etDoc = (EditText)findViewById(R.id.etDoc);
        ivImg =(ImageView)findViewById(R.id.ivImg);
        etValidity = (EditText)findViewById(R.id.etValidity);
        btnChoose = (Button)findViewById(R.id.btnChoose);
        btnSave = (Button)findViewById(R.id.btnSave);
        db = new SQLiteHelper(this);

        btnChoose.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                ActivityCompat.requestPermissions(
                        GetDoc.this,
                        new String[]{Manifest.permission.READ_EXTERNAL_STORAGE},
                        REQUEST_CODE_GALLERY
                );
            }
        });


        btnSave.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                try {
                    String doc = etDoc.getText().toString().trim();
                    String val = etValidity.getText().toString().trim();
                    if(doc.length()==0){
                        etDoc.setError("Please enter Document name.");
                        etDoc.setText("");
                        etDoc.requestFocus();
                    }
                    if(val.length()==0){
                        etDoc.setError("Please enter validity.");
                        etDoc.setText("");
                        etDoc.requestFocus();
                    }
                    db.insertData(
                            etDoc.getText().toString().trim(),
                            etValidity.getText().toString().trim(),
                            imageViewToByte(ivImg)
                    );
                    Toast.makeText(GetDoc.this, "Document Added Successfully !!", Toast.LENGTH_SHORT).show();
                    etDoc.setText("");
                    ivImg.setImageResource(R.drawable.docget);
                    etValidity.setText("");
                    Intent intent = new Intent(GetDoc.this,Dashboard.class);
                    startActivity(intent);
                    finish();
                }catch (Exception e){
                    e.printStackTrace();
                }
            }


        });


    }

    public static byte[] imageViewToByte(ImageView image) {
        Bitmap bitmap = ((BitmapDrawable)image.getDrawable()).getBitmap();
        ByteArrayOutputStream stream = new ByteArrayOutputStream();
        bitmap.compress(Bitmap.CompressFormat.PNG, 100, stream);
        byte[] byteArray = stream.toByteArray();
        return byteArray;
    }

    @Override
    public void onRequestPermissionsResult(int requestCode, @NonNull String[] permissions, @NonNull int[] grantResults) {

        if(requestCode == REQUEST_CODE_GALLERY){
            if (grantResults.length > 0 && grantResults[0] == PackageManager.PERMISSION_GRANTED) {
                Intent intent =  new Intent(Intent.ACTION_PICK);
                intent.setType("image/*");
                startActivityForResult(intent, REQUEST_CODE_GALLERY);
            }else{
                Toast.makeText(this, "You Don't have permission to access file location", Toast.LENGTH_SHORT).show();
            }
            return;
        }
        super.onRequestPermissionsResult(requestCode, permissions, grantResults);
    }

    @Override
    protected void onActivityResult(int requestCode, int resultCode, Intent data) {

        if(requestCode == REQUEST_CODE_GALLERY && resultCode == RESULT_OK && data != null){
            Uri uri = data.getData();

            try {
                InputStream inputStream = getContentResolver().openInputStream(uri);
                Bitmap bitmap = BitmapFactory.decodeStream(inputStream);
                ivImg.setImageBitmap(bitmap);
            } catch (FileNotFoundException e) {
                e.printStackTrace();
            }
        }

        super.onActivityResult(requestCode, resultCode, data);
    }

}
