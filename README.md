WHAT IT SHOULD BE
=================
Makunaima should be a computer program designed to make on-line mathematical exams the easy way.

It should be one day a web application, hopefully!

You will need to be login to use the application.

There are three types of users (A, T and S accounts).

Administrator.
--------------

Is the guy who grants permissions, allocates space and deals with security issues and installs and maintains the whole thing.
If you need some kind of security you need one of those guys.

Teachers account's.
-------------------

These are created by the administrator. Each teacher can design exams.

I imagine that a user logs in for the first time and then he is presented with a 'home' page where there is only help.
She can go ahead a create an exam. She would need to have all the questions prepared, with the correct answer and the value of each question.

Everything is in latex, so she should know the basics, at the very least. The best preparation would be to have a latex exam at hand.
she would summit all the images necesary and include all headers if it is not standard. She will need to specify the right choice for each question and the value. and perhaps things like negative values if the answer provided is not correct.

The most difficult of the mandatory parts is to design the header of the on-line exam. A header will contain a set of variables and a set of fields. Each variable is just a name, like the name of the exam, the term, the teacher or other stuff that belongs to the exam itself and is not particular to the student. Could be an image or any valid latex code.

A field is something that is pontentially different for each student. Could be the name of the student, the carnet number at the University.

Later during the exam this fields could be filled by the student or automatically filled from a student database (more on that latter).

Once the teacher has created all variables and fields she will need to design the header by a drag and drop procedure. Just placing all the generated images at the right position.

She will aslo have the option to have a written exam. For that she will need to provide a latex template. It is concievable that the header of the latex exam will be taken form the header already designed header. But this is not possible just now.

All this process will be extraordinary simplified by the use of templates. A template exam would contain all the header desing, the only thing left to do by the teacher would be to enter the labels of the variables (name of the subject, term, University). At a given university/departament the exams layout are likely to be the same. So it should exist some way of sharing templates (on the top of some predesigned universaly availables templates).

The last step of the design process will be to link the exam to a student database. A student list is a CSV file will be provided by the teacher. Each of the entrys (columns) in the file should have an id that identifies them. Probably something as simple as:

name, lastname, carnet
Nicolás, Hatcher, 16581256

should work. The three id's "name", "lastname" and "carnet" will be linked to the id's of the fields in the exam header. I will think of better ways of achiving this link. But that will be OK for version 1. Again, the use of a template will kill this problem.

One everything is done, the teacher will need to click to generate the exam. This will generate a pdf with all the exams, and a webpage for each student (and a database).

The precise way in which the student application will work, I have not yet decided. Could be the same server (may be in a different port) or could be a completely different sever.
I am kind of thinking that the best way is to have everything in the same server.

Student.
--------

That would be the simplest one to use. Just answer the questions!.

Although this is the most difficult to plan. everything can work in many different ways:

* Student arrives the classrom, sits on a computer navigate to a determined wegpage and introduces name and password. This opens the exam. When she is ready, call for a teacher and both verify that everything is in order, the teacher introduces a password and summbit the exam. The grade appers on the screen.

* Now there is a printed version. Each student has a different exam with his/her name on it. This is cumbersome, but possible.

* Better, each exam has a number. The student introces her password and the number of the exam.

The are infinitely many variations on this subject, we need to provide a way to make as many of them possible.
