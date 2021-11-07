import sqlite3

def openDBConnection(file):
    conn = None
    try:
        conn = sqlite3.connect(file, check_same_thread=False)
        conn.row_factory=sqlite3.Row
        initDb(conn)
    except sqlite3.Error as e:
        return "Database problem: {}".format(e.args[0])
    return conn

def initDb(conn):    
    try:
        conn.execute("SELECT 1 FROM notes LIMIT 1")
    except sqlite3.Error as e:
        # table not found
        conn.execute("""CREATE TABLE IF NOT EXISTS notes (
						id INTEGER PRIMARY KEY AUTOINCREMENT, 
						title TEXT, 
						text TEXT, 
						hidden INTEGER)""")
        try:
            # create sample data
            conn.execute("""INSERT INTO notes ('title','text','hidden') VALUES
                ('first','Hello world',0),
                ('second','Hidden',1);""")
            conn.commit()            
        except sqlite3.Error as e:
            return "Database problem: {}".format( e.args[0] )
            
    return
