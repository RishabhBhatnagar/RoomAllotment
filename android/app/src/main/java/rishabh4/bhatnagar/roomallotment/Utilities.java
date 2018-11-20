package rishabh4.bhatnagar.roomallotment;

import android.app.Activity;
import android.content.Context;
import android.support.design.widget.Snackbar;
import android.view.View;
import android.view.inputmethod.InputMethodManager;

public class Utilities {
    static void showSnackbarShort(View parentLayout, String message){
        Snackbar.make(parentLayout, message, Snackbar.LENGTH_SHORT).show();
    }
    static void showSnackbarLong(View parentLayout, String message){
        Snackbar.make(parentLayout, message, Snackbar.LENGTH_LONG).show();
    }
    static void hideSoftKeyboard(Activity activity) {
        InputMethodManager inputMethodManager = (InputMethodManager)  activity.getSystemService(Activity.INPUT_METHOD_SERVICE);
        inputMethodManager.hideSoftInputFromWindow(activity.getCurrentFocus().getWindowToken(), 0);
    }
    static void clearFocus(Activity activity){
        activity.getCurrentFocus().clearFocus();
    }
}
