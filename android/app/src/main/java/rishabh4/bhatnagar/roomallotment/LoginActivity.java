package rishabh4.bhatnagar.roomallotment;

import android.content.Intent;
import android.content.res.Resources;
import android.inputmethodservice.Keyboard;
import android.os.Bundle;
import android.support.annotation.Nullable;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

public class LoginActivity extends AppCompatActivity {

    private Button loginButton;
    private EditText usernameET;
    private EditText passwordET;
    private View parentLayout;
    private Resources resources;

    @Override
    protected void onCreate(@Nullable Bundle savedInstanceState) {
        setContentView(R.layout.activity_login);
        super.onCreate(savedInstanceState);
        initViews();
        resources = getResources();

        loginButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                // hide the keyboard when user clicks the loginButton.
                Utilities.hideSoftKeyboard(LoginActivity.this);

                if(!areCredentialsEmpty()){

                    // credentials are not empty
                    if(DatabaseManager.
                            validateUser(
                                    usernameET.getText().toString(),
                                    passwordET.getText().toString())
                            ){

                        // user is validated.
                        // Redirect to main activity.
                        Intent mainIntent = new Intent(LoginActivity.this, MainActivity.class);
                        startActivity(mainIntent);

                        finish();   // finishing login activity.
                        // finishing to forbid user from returning to login page.
                    }
                    else{
                        // wrong credentials.
                        Utilities.showSnackbarLong(parentLayout, resources.getString(R.string.not_authenticated));
                    }
                } else {
                    // uname or password field is empty.
                    Utilities.showSnackbarShort(parentLayout, resources.getString(R.string.fill_fields));
                }
            }
        });

        //whenever user clicks on any parent layout, hide the keyboard.
        parentLayout.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Toast.makeText(LoginActivity.this, "clicked", Toast.LENGTH_SHORT).show();
                Utilities.hideSoftKeyboard(LoginActivity.this);
                Utilities.clearFocus(LoginActivity.this);
            }
        });
    }

    private boolean areCredentialsEmpty() {
        if(usernameET.getText().toString().isEmpty() ||
                        passwordET.getText().toString().isEmpty()){
            return true;
        }else{
            return false;
        }
    }

    private void initViews() {
        loginButton = findViewById(R.id.login_submit_btn);
        usernameET = findViewById(R.id.login_uname);
        passwordET = findViewById(R.id.login_pswd);
        parentLayout = findViewById(R.id.login_parent_layout);
    }
}