package rishabh4.bhatnagar.roomallotment;

import android.content.Context;
import android.support.design.widget.Snackbar;
import android.view.View;
import android.widget.Toast;

public class Utilities {
    static void showSnackbarShort(View parentLayout, String message){
        Snackbar.make(parentLayout, message, Snackbar.LENGTH_SHORT).show();
    }
    static void showSnackbarLong(View parentLayout, String message){
        Snackbar.make(parentLayout, message, Snackbar.LENGTH_LONG).show();
    }
}
