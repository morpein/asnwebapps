const port = process.env.PORT || 3000

var os = require('os');
const hostname=os.hostname();

const express = require('express');
const app = express();

app.use(express.json());
app.use(express.urlencoded({
  extended: true
}));
app.use('/static',express.static(__dirname + '/html'));
app.set('views',__dirname + '/views');
app.set('view engine','ejs');

const dbUtil= require('./dbutil');

const db = dbUtil.opendb('/tmp/notes.sqlite');

app.get('/', async (req, res) => {
	let notes=[];
	let query="SELECT * FROM notes";

	const rows = await db.raw(query);

	rows.forEach( note => {
		notes.push(note);
	})
	res.render('index',{notes:notes, serveraddress:req.socket.localAddress,servername:hostname});
})
app.get('/note/:id', async (req, res) => {
	let note={};
	let query="SELECT * FROM notes";
	query+=` WHERE id=${req.params.id}`;

	const rows = await db.raw(query);

	res.render('note',{note:rows[0], serveraddress:req.socket.localAddress,servername:hostname});
})

app.post('/', async (req, res) => {
	let query=`INSERT INTO notes ('title','text','hidden') VALUES`
			+`('${req.body.title}','${req.body.text}',0);`;
	try {
			const result=await db.raw(query);
	} catch (err) {
		console.log('Insert error '+err);
	}
	res.redirect('/');
})

const server=app.listen(port, () =>  {  
	console.log(`Running at Port ${port}`);
});
