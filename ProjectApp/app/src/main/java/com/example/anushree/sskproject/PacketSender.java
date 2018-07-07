package com.example.anushree.sskproject;

import android.app.ProgressDialog;
import android.content.Context;
import android.net.ConnectivityManager;
import android.net.NetworkInfo;
import android.os.AsyncTask;
import android.util.Log;
import android.widget.Toast;

import org.json.JSONException;
import org.json.JSONObject;

import java.io.DataOutputStream;
import java.io.IOException;
import java.io.InputStreamReader;
import java.net.ConnectException;
import java.net.Socket;

/**
 * Created by Anushree on 6/15/2018.
 */

public class PacketSender extends AsyncTask<JSONObject,String,JSONObject>{
    public static String HOST = "13.250.26.71";
    public static int PORT = 1111;
    private String dataReceived = "";
    ProgressDialog progressDialog;
    Context context;
    public AsyncResponse delegate = null;
    PacketSender(Context context){
        this.context = context;
    }
    JSONObject sendPackage;
    JSONObject receivedPackage;


    private boolean isNetworkAvailable() {
        ConnectivityManager connectivityManager
                = (ConnectivityManager) context.getSystemService(Context.CONNECTIVITY_SERVICE);
        NetworkInfo activeNetworkInfo = connectivityManager.getActiveNetworkInfo();
        return activeNetworkInfo != null && activeNetworkInfo.isConnected();
    }

    @Override
    protected JSONObject doInBackground(JSONObject... jsonObjects) {
        sendPackage = jsonObjects[0];
        Socket socket;
        DataOutputStream dataOutputStream;
        try{
            if(!isNetworkAvailable()){
                Toast.makeText(context, "Could not connect to server!", Toast.LENGTH_LONG).show();
                return new JSONObject("{\"STATUS\":\"OK\"}");
            }
            socket = new Socket(HOST,PORT);
            dataOutputStream = new DataOutputStream(socket.getOutputStream());
            dataOutputStream.writeBytes(sendPackage.toString());
            Log.i("Data sent",sendPackage.toString());
            InputStreamReader inputStreamReader = new InputStreamReader(socket.getInputStream());
            int character;
            while((character=inputStreamReader.read())!=-1){
                dataReceived = dataReceived + (char)character;
            }
            receivedPackage = new JSONObject(dataReceived);
            Log.i("Data Received",dataReceived);
            return receivedPackage;
        }
        catch (ConnectException e){
            Toast.makeText(context, "Could not connect to server!", Toast.LENGTH_LONG).show();
            e.printStackTrace();
        }
        catch (JSONException e){
            e.printStackTrace();
        }
        catch (IOException e)
        {
            e.printStackTrace();
        }
        return null;
    }

    @Override
    protected void onPreExecute() {
        super.onPreExecute();
        progressDialog = ProgressDialog.show(context,"Connecting to Server","Please wait...");
    }

    @Override
    protected void onPostExecute(JSONObject jsonObject) {
        super.onPostExecute(jsonObject);
        progressDialog.dismiss();
        delegate.processFinish(jsonObject);
    }
}
