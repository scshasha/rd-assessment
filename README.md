# rd-assessment
This is an assessment applicaton
## Reqiurements
- npm (via node) - to run front end
- php server (xampp, wampp, ampps, etc)
- MySQL database

## Setup

- Clone the repo
- run `checkout -b fe origin/fe` to/and pull the frontend application.
- run `checkout -b be origin/be` to pull down the backend api for the application.

### Backend:
- Create a database
- Copy/Rename `.env-sample.json` to `.env.json` and update your credentials as necessary.
- Run http://your-ai-url/setup.php to execute a script the will create the needed table on your newly created DB.
### Frontend:
- Execute `npm intsall` to update/download dependecies. 
- Copy/rename `src/environments/environment-sample.ts` to `src/environments/environment.ts` and update to your `api`'s base url. 
- Execute `ng serve --o`
