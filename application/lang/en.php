<?php

// login & registration classes
define("MESSAGE_ACCOUNT_NOT_ACTIVATED", "Your account has not been activated. Check your email for a verification link.");
define("MESSAGE_COOKIE_INVALID", "Invalid Cookie");
define("MESSAGE_DATABASE_ERROR", "There was a problem connecting to the database.");
define("MESSAGE_EMAIL_ALREADY_EXISTS", "The email address you entered has already been registered. If this is your account, use the password reset form to access your account.");
define("MESSAGE_EMAIL_CHANGE_FAILED", "Email address could not be updated at this time.");
define("MESSAGE_EMAIL_CHANGED_SUCCESSFULLY", "Your email address has been updated successfully. New email address is ");
define("MESSAGE_EMAIL_EMPTY", "The email field cannot be empty.");
define("MESSAGE_EMAIL_INVALID", "The email address you entered is not in a valid email format");
define("MESSAGE_EMAIL_SAME_LIKE_OLD_ONE", "The email address you entered is the same as your current one. No changes were made.");
define("MESSAGE_EMAIL_TOO_LONG", "Email address cannot be longer than 64 characters.");
define("MESSAGE_LINK_PARAMETER_EMPTY", "Empty link parameter data.");
define("MESSAGE_LOGGED_OUT", "You have been logged out successfully.");
define("MESSAGE_ACCOUNT_DELETED", "Your account was deleted successfully. We're sorry to see you go!");
define("MESSAGE_ACCOUNT_NOT_DELETED", "There was a problem deleting your account. Contact us for more help");

// The "login failed"-message is a security improved feedback that doesn't show a potential attacker if the user exists or not
define("MESSAGE_LOGIN_FAILED", "The username you entered could not be found.");
define("MESSAGE_OLD_PASSWORD_WRONG", "Your current password was entered incorrectly.");
define("MESSAGE_PASSWORD_BAD_CONFIRM", "The passwords you entered did not match.");
define("MESSAGE_PASSWORD_CHANGE_FAILED", "Password could not be updated at this time.");
define("MESSAGE_PASSWORD_CHANGED_SUCCESSFULLY", "Your password has been updated successfully.");
define("MESSAGE_PASSWORD_EMPTY", "The password field cannot be empty.");
define("MESSAGE_PASSWORD_RESET_MAIL_FAILED", "A password reset email could not be sent. Error: ");
define("MESSAGE_PASSWORD_RESET_MAIL_SUCCESSFULLY_SENT", "A password reset email has been sent to you. ");
define("MESSAGE_PASSWORD_TOO_SHORT", "Password must be at least 6 characters");
define("MESSAGE_PASSWORD_WRONG", "The password you entered was incorrect.");
define("MESSAGE_PASSWORD_WRONG_3_TIMES", "You have entered an incorrect password 3 or more times. Please wait 30 seconds to try again.");
define("MESSAGE_REGISTRATION_ACTIVATION_NOT_SUCCESSFUL", "ID/Verification code combination was invalid");
define("MESSAGE_REGISTRATION_ACTIVATION_SUCCESSFUL", "Your account has been activated successfully.");
define("MESSAGE_REGISTRATION_FAILED", "Registration could not be completed. Please go back and try again.");
define("MESSAGE_RESET_LINK_HAS_EXPIRED", "Your reset link has expired. Please use the reset link within one hour.");
define("MESSAGE_VERIFICATION_MAIL_ERROR", "Sorry, we could not send you an verification mail. Your account has NOT been created.");
define("MESSAGE_VERIFICATION_MAIL_NOT_SENT", "Verification email could not be sent. Error: ");
define("MESSAGE_VERIFICATION_MAIL_SENT", "Your account has been created successfully. Check your email for a link to activate your account.");
define("MESSAGE_USER_DOES_NOT_EXIST", "The username you entered could not be found.");
define("MESSAGE_USERNAME_BAD_LENGTH", "Username must 2-64 characters.");
define("MESSAGE_USERNAME_CHANGE_FAILED", "Username could not be updated at this time.");
define("MESSAGE_USERNAME_CHANGED_SUCCESSFULLY", "Your username has been updated successfully. New username is ");
define("MESSAGE_USERNAME_EMPTY", "The username field cannot be empty.");
define("MESSAGE_USERNAME_EXISTS", "The username you entered has already been registered.");
define("MESSAGE_USERNAME_INVALID", "Username can only contain letters and numbers, 2-64 characters long.");
define("MESSAGE_USERNAME_SAME_LIKE_OLD_ONE", "The username you entered is the same as your current one. No changes were made.");

// create class messages
define("MESSAGE_POST_CREATED", "Discussion was added successfully.");
define("MESSAGE_POST_NOT_CREATED", "Discussion could not be added at this time");
define("MESSAGE_REPLY_CREATED", "Your reply was saved to this discussion.");
define("MESSAGE_REPLY_NOT_CREATED", "Your reply was not added. Try again.");
define("MESSAGE_POST_UPDATED", "Discussion was updated successfully.");
define("MESSAGE_POST_NOT_UPDATED", "Discussion could not be updated at this time");
define("MESSAGE_POST_DELETED", "Post deleted successfully");
define("MESSAGE_POST_NOT_DELETED", "Post could not be deleted at this time");
define("MESSAGE_POST_SOLVED", "This post is now marked as solved.");
define("MESSAGE_POST_NOT_SOLVED", "This post was not marked as solved. Try again.");
define("MESSAGE_POST_REOPENED", "This post is now reopened.");
define("MESSAGE_POST_NOT_REOPENED", "This post was not reopened. Try again.");
