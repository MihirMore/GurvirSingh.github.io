package com.example.kisho.project;

/**
 * Created by kisho on 15/03/2019.
 */

public class Doc {
    private int id;
    private String doc;
    private byte[] image;
    private  String val;


    public Doc(int id, String doc, String val, byte[] image) {
        this.id = id;
        this.doc = doc;
        this.val = val;
        this.image = image;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getDoc() {
        return doc;
    }

    public void setDoc(String doc) {
        this.doc = doc;
    }

    public byte[] getImage() {
        return image;
    }

    public void setImage(byte[] image) {
        this.image = image;
    }

    public String getVal() {
        return val;
    }

    public void setVal(String val) {
        this.val = val;
    }
}
