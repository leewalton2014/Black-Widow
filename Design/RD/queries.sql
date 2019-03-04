select eventID, eventTitle, eventDescription, eventDate, eventTime, eventType, stageNumber, stageCapacity, ticketPrice, imgRef
from aa_events
inner join aa_event_type on aa_events.eventID = aa_event_type.typeID
inner join aa_event_stage on aa_events.eventID = aa_event_stage.stageID
group by eventDate
order by eventTime
having eventDate >= date(now());

select passwordsHash
from aa_customers
where custUsername = '$username';
