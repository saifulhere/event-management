<!-- This file will be used to tracking the work progress. -->
1.ORGANIZER MODEL

    user_id             <!--There will be an one to one relationship with user table-->
    organizer_name
    organizer_tagline
    organizer_about
    organizer_phone
    organizer_email
    organizer_image 

2.EVENT MODEL

    user_id             <!--There will be an one to one relationship with user table-->
    organizer_id        <!--There will be an one to one relationship with organizer table-->
    event_thumbnail
    title
    tagline
    short_description
    location
    start_date_time
    end-date_time
    booking_start_date_time
    booking_end_date_time
    gallery

3. ORGANIZER SOCIAL MEDIA MODEL

    organizer_id        <!--There will be an one to my relationship with organizer table-->
    event_id
    facebook
    instagram
    twitter
    linkedin

4. EVENT GUEST MODEL

    event_id            <!--There will be an one to may relationship with event table-->
    organizer_id        <!--There will be an one to one relationship with organizer table-->
    guest_name
    guest_designation
    guest_about

5. BOOK EVENTS

    event_id
    guest_id            <!--This unique id will be generated using javascript-->
    guest_name
    guest_email
    phone
    email
    image
    number_of_people
    payment_status      <!--Default will be pending-->

    Redirect to a page with those filled information in database and there should be a new button proceed to payment

    Date: 20/08/2023
    **Events and Necessary Function Related to events are completed.
    **Text Editor has been added to events form.
    **Repeatable field for saving event's guests name in event form.