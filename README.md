# php oop exercise
PHP OOP exercise using testscores.sql 

Use an entity class and hydrator to: 

1. Create an endpoint that outputs all names and test scores in json format 

  { scores: [ {name: 'Mike', score: 46}, {name: 'Anna', score: 99}] }
  
2. Create an endpoint that takes an id as a GET parameter and outputs all information relating to that user in json like:

  {score: {
  "id": 48,
  "first_name": "Molly",
  "last_name": "Herreran",
  "email": "mherreran1b@bizjournals.com",
  "gender": "Female",
  "score": 57
}
}

3. Add a service class that calculates the grade based on the users score, using the below marking scheme. Add the users grade to the endpoint from task 2 with the key grade in the json response:

  > 95 = A
> 80 = B
> 70 = C
> 60 = D
< 61 = F
