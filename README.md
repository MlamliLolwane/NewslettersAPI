<figure>
  <img
  src="Newsletters API ERD.png"
  alt="Newsletters API ERD">
  <figcaption>The Entity Relational Diagram for the Newsletters API</figcaption>
</figure>


### iLetters - Newsletters API

This microservice is responsible for composing as well as managing the schools newsletters.

The administrator of the school has an option of selecting which Grades as well as the Classes the newsletters are 
to be sent to.

This microservice is not the one that actually sends the newsletters. There is a different microservice (Messenger API) 
which is responsible for the dispatching of the newsletters to the parents.

[Go back to the iLetters project](https://github.com/MlamliLolwane/iLetters)
