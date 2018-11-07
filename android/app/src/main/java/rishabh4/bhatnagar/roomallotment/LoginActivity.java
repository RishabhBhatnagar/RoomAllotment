package rishabh4.bhatnagar.roomallotment;

import android.content.res.Resources;
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
                if(!areCredentialsEmpty()){
                    if(DatabaseManager.
                            validateUser(
                                    usernameET.getText().toString(),
                                    passwordET.getText().toString())
                            ){
                        // user is validated.
                    }
                    else{
                        // wrong credentials.
                        Utilities.showSnackbarLong(parentLayout, resources.getString(R.string.not_authenticated);
                    }
                } else {
                    // uname or password empty.
                    Utilities.showSnackbarShort(parentLayout, resources.getString(R.string.fill_fields));
                }
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