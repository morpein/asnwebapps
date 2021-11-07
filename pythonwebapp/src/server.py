import socket
import os
from flask import Flask,redirect, url_for, request, render_template
from dbutil import openDBConnection

app = Flask(__name__)

hostname=socket.gethostname()

port = int(os.environ.get("PORT", 5000))

conn=openDBConnection('/tmp/notes.sqlite')

@app.route('/')
@app.route('/note')
def getNotes():
    cursor = conn.execute("SELECT * FROM notes")
    return render_template('notes.html', notes = cursor.fetchall(), hostname = hostname)

@app.route('/note/<int:id>')
def viewNote(id):
    qry="SELECT * FROM notes where id={}".format(id);
    cursor = conn.execute(qry )
    result=  cursor.fetchone()
    print(result)
    return render_template('note.html',note = result, hostname = hostname)

@app.route('/note', methods=['POST'])
def addNote():
    print ('Posting note {}'.format(request.form["title"]) )    

    qry="INSERT INTO notes ('title','text','hidden') VALUES ('{}','{}',{});".format(
         request.form['title'], request.form['text'], request.form.get('hidden')!=None
        )
    conn.execute(qry )
    conn.commit
    return redirect(url_for('getNotes'))

if __name__ == '__main__':
    app.debug = True
    app.run(host = '0.0.0.0',port = port)
    conn.close()
