package com.example.kisho.project;

import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;
import android.database.sqlite.SQLiteStatement;


public class SQLiteHelper extends SQLiteOpenHelper {

    private final Context context;
    SQLiteDatabase db;

    public SQLiteHelper(Context context) {
        super(context, "Docdb.sqlite", null, 1);
        this.context = context;
        db = this.getWritableDatabase();
    }

    @Override
    public void onCreate(SQLiteDatabase db) {
        db.execSQL("CREATE TABLE IF NOT EXISTS DOC(ID INTEGER PRIMARY KEY AUTOINCREMENT, doc VARCHAR, val VARCHAR, image BLOG )");
    }

    @Override
    public void onUpgrade(SQLiteDatabase sqLiteDatabase, int i, int i1) {

    }

    public void queryData(String sql){
        SQLiteDatabase database = getWritableDatabase();
        database.execSQL(sql);
    }



    public void insertData(String doc, String val, byte[] image){

        SQLiteDatabase database = getWritableDatabase();
        String sql = "INSERT INTO DOC VALUES (NULL, ?, ?, ?)";

        SQLiteStatement statement = database.compileStatement(sql);
        statement.clearBindings();

        statement.bindString(1, doc);
        statement.bindString(2, val);
        statement.bindBlob(3,image);

        statement.executeInsert();
    }

    public void updateData(int id, String doc, String val , byte[] image) {
        SQLiteDatabase database = getWritableDatabase();


        String sql = "UPDATE DOC SET doc = ?, val = ?, image = ? WHERE id = ?";
        SQLiteStatement statement = database.compileStatement(sql);

        statement.bindString(1, doc);
        statement.bindString(2,val);
        statement.bindBlob(3, image);
        statement.bindDouble(4, (double)id);

        statement.execute();
        database.close();
    }

    public  void deleteData(int id) {
        SQLiteDatabase database = getWritableDatabase();

        String sql = "DELETE FROM DOC WHERE id = ?";
        SQLiteStatement statement = database.compileStatement(sql);
        statement.clearBindings();
        statement.bindDouble(1, (double)id);

        statement.execute();
        database.close();
    }



    public Cursor getData(String sql){
        SQLiteDatabase database = getWritableDatabase();
        return database.rawQuery(sql, null);
    }


}
