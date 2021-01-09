package com.example.kisho.project;

import android.content.Context;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.ImageView;
import android.widget.TextView;

import java.util.ArrayList;

/**
 * Created by kisho on 15/03/2019.
 */

public class DocListAdapter extends BaseAdapter {
    private Context context;
    private int layout;
    private ArrayList<Doc> docList;

    public DocListAdapter(Context context, int layout, ArrayList<Doc> docList) {
        this.context = context;
        this.layout = layout;
        this.docList = docList;
    }

    @Override
    public int getCount() {
        return docList.size();
    }

    @Override
    public Object getItem(int position) {
        return docList.get(position);
    }

    @Override
    public long getItemId(int position) {
        return position;
    }


    private class ViewHolder{
        ImageView imageView;
        TextView txtDoc;
        TextView txtVal;
    }

    @Override
    public View getView(int position, View view, ViewGroup viewGroup) {

        View row = view;
        ViewHolder holder = new ViewHolder();

        if(row == null){
            LayoutInflater inflater = (LayoutInflater)context.getSystemService(Context.LAYOUT_INFLATER_SERVICE);
            row = inflater.inflate(layout, null);

            holder.txtDoc = (TextView) row.findViewById(R.id.tvType);
            holder.txtVal = (TextView) row.findViewById(R.id.tvValidity);
            holder.imageView = (ImageView) row.findViewById(R.id.imageAdd);
            row.setTag(holder);
        }else{
            holder = (ViewHolder)row.getTag();
        }

        Doc doc = docList.get(position);
        holder.txtDoc.setText(doc.getDoc());
        holder.txtVal.setText(doc.getVal());
        byte[] docImage = doc.getImage();
        Bitmap bitmap = BitmapFactory.decodeByteArray(docImage,0,docImage.length);
        holder.imageView.setImageBitmap(bitmap);
        return row;
    }

}
