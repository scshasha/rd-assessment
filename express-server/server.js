const express = require('express');
const bodyParser = require('body-parser');
const cors = require('cors');



const PORT = 3000;

const app = express();

app.use(bodyParser.json());

app.use(cors());

app.get('/', function(req, res) {
	res.send('Msg fro server');
});

app.get('/list', function(req, res){
	console.log('Retrieving data!!');
	let data = [];
	data['data'] = [{
          'first_name': 'Chris',
          "last_name": 'Shasha',
        }];
	res.status(200).send(data);
});

app.post('/postnewuser', function(req, res) {
	console.log("Posting data!!");
	console.log(req.body);
	res.status(200).send({"data": {'msg': 'Data recieved.'}})
});

app

app.listen(PORT, function(){
	console.log("Server running on localhost:" + PORT);
});
