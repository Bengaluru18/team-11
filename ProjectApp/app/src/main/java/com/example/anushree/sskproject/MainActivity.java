package com.example.anushree.sskproject;

import android.content.Intent;
import android.content.SharedPreferences;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.text.TextUtils;
import android.view.View;
import android.widget.EditText;
import android.widget.Toast;

import org.json.JSONException;
import org.json.JSONObject;

public class MainActivity extends AppCompatActivity {
    EditText emailid;
    EditText password;
    public static String USER_ID = "UserID";
    public static String PASSWORD = "Password";
    public static String LOGGED_IN = "LoggedIn";
    public static String EMAILID = "EMAILID";
    public static String STATUS_OK = "OK";
    public static String STATUS = "STATUS";
    public static String WRONG_USERID = "Wrong UID";
    public static String WRONG_PASSWORD = "Wrong Password";
    public static String SHARED_PREFERENCE_FILENAME = "com.project.sharedpreferences";
    SharedPreferences sharedPreferences;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        emailid = (EditText)findViewById(R.id.user_id);
        password = (EditText)findViewById(R.id.input_password);
        sharedPreferences = getSharedPreferences(SHARED_PREFERENCE_FILENAME,MODE_PRIVATE);

    }

    public void login(View view) {
        if(TextUtils.isEmpty(emailid.getText())){
            emailid.setError("Enter user name");
        }
        else if(TextUtils.isEmpty(password.getText())){
            password.setError("Enter the password");
        }
        else{
            JSONObject jsonObject = new JSONObject();
            try {
                jsonObject.put(EMAILID,emailid.getText());
                jsonObject.put(PASSWORD,password.getText());
                PacketSender packetSender = new PacketSender(this);
                packetSender.delegate = new AsyncResponse() {
                    @Override
                    public void processFinish(JSONObject jsonObject) {
                        Toast.makeText(MainActivity.this, "OK", Toast.LENGTH_SHORT).show();
                        try
                        {
                            STATUS = jsonObject.getString("STATUS");
                        } catch (JSONException e) {
                            e.printStackTrace();
                        }

                        if (STATUS.equals(STATUS_OK)) {
                            SharedPreferences.Editor editor = sharedPreferences.edit();
                            editor.putBoolean(LOGGED_IN, true);
                            editor.putString(USER_ID, emailid.getText().toString());
                            editor.putString(PASSWORD, password.getText().toString());
                            try {
                                editor.putString(EMAILID,jsonObject.getString(EMAILID));
                            } catch (JSONException e) {
                                e.printStackTrace();
                            }
                            editor.apply();
                            Intent intent = new Intent(MainActivity.this,StartActivity.class);
                            intent.addFlags(Intent.FLAG_ACTIVITY_CLEAR_TOP);
                            finish();
                            startActivity(intent);
                        } else if (STATUS.equals(WRONG_USERID)) {
                            emailid.setError("WRONG USER ID");

                        } else if (STATUS.equals(WRONG_PASSWORD)) {
                            password.setError("WRONG PASSWORD");
                        }
                    }
                };
                packetSender.execute(jsonObject);
            } catch (JSONException e) {
                e.printStackTrace();
            }

        }

    }
}
