package com.example.kisho.project;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.animation.AnimationUtils;
import android.widget.ImageView;
import android.widget.TextView;

public class Animation extends AppCompatActivity {

    android.view.animation.Animation a1;
    ImageView ivBMI;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_animation);

        ivBMI = (ImageView)findViewById(R.id.ivBMI);
        a1 = AnimationUtils.loadAnimation(getApplicationContext(),R.anim.a1);
        ivBMI.startAnimation(a1);

        new Thread(new Runnable() {
            @Override
            public void run() {
                try {
                    Thread.sleep(2000);
                } catch (InterruptedException e) {
                    e.printStackTrace();
                }

                Intent i = new Intent(getApplicationContext(),MainActivity.class);
                startActivity(i);
                finish();
            }
        }).start();

    }
}
