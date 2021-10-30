exports.opendb = function (dbFile) {
  let db=null;
  try {
    db=require('knex')({
    client: 'sqlite3',
    connection: {
      filename: dbFile
    },
    useNullAsDefault: true
  })
} catch (err) {
  console.log("Error de conexión con DB: "+err);
}
  initdb(db);
  return db;
};

async function initdb(db) {
  try {
    await db.raw("SELECT 1 FROM notes LIMIT 1");
  } catch (err) {
    //table not found
    try {
      await db.raw(` CREATE TABLE IF NOT EXISTS notes (
        id INTEGER PRIMARY KEY AUTOINCREMENT, 
        title TEXT, 
        text TEXT, 
        hidden INTEGER)`)
      await db.raw(`INSERT INTO notes ('title','text','hidden') VALUES
            ('first','Hello world',0),
            ('second','Hidden',1);`)
      console.log("Tabla inicializada");
    } catch (err) {
      console.log("Error inicializando db:" + err); 
    } 
  }
}