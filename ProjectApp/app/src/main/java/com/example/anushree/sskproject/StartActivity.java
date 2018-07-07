package com.example.anushree.sskproject;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.CalendarView;

public class StartActivity extends AppCompatActivity {
    CalendarView cv;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_start);
        cv = (CalendarView)findViewById(R.id.calendarView);
    }

    public void selectDate(View view) {
        cv.getDate();
    }
}
