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
          "first_name": 'Chris',
          "last_name": 'Shasha',
          "email": 'scshasha@icloud.com',
          "phone": '0123654789',
        },
        {
          "first_name": 'Jane',
          "last_name": 'Doe',
          "email": 'janedoe@icloud.com',
          "phone": '0123654789',
        },
        {
          "first_name": 'John',
          "last_name": 'Doe',
          "email": 'johndoe@icloud.com',
          "phone": '0123654789',
        },
    ];
    console.log(data);
	res.status(200).send(data);
});

app.post('/post', function(req, res) {
	console.log("Posting data!!");
	console.log(req.body);
	res.status(200).send({"data": {'msg': 'Data recieved.'}})
});

app

app.listen(PORT, function(){
	console.log("Server running on localhost:" + PORT);
});
