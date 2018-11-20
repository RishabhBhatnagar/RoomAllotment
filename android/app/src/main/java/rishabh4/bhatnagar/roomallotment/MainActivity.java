package rishabh4.bhatnagar.roomallotment;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.Toolbar;
import android.view.View;

public class MainActivity extends AppCompatActivity {

    private View parentLayout;
    private Toolbar toolbar;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        initViews();
        setSupportActionBar(toolbar);
    }

    private void initViews() {
        parentLayout = findViewById(R.id.login_parent_layout);
        toolbar = findViewById(R.id.toolbar);
    }
}
