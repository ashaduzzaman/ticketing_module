<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  max-width: 1000px;;
}

#customers td, #customers th {
  border: 2px solid #1e888a;
  padding: 10px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}
#customers td:nth-child(odd){color: white;background-color: #86991c;}

#customers tr:hover {background-color: #ddd;}

caption {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #1e888a;
  color: #fff;
}
</style>
</head>
<body>

<table id="customers">
    <caption>Ticket Details</caption>
    <tr>
        <td>Ticket Id:</td>
        <td>{{ $newTicketDetails['ticket_id'] }}</td>
        <td>CRM Id:</td>
        <td>{{ $newTicketDetails['crm_id'] }}</td>
    </tr>
    <tr>
        <td>Ticket Status:</td>
        <td>{{ $newTicketDetails['ticket_status'] }}</td>
        <td>Ticket Created Time:</td>
        <td>{{ $newTicketDetails['created_at'] }}</td>
    </tr>
    <tr>
        <td>Customer Name:</td>
        <td>{{ $newTicketDetails['customer_name'] }}</td>
        <td>Customer Mobile No:</td>
        <td>{{ $newTicketDetails['customer_contact'] }}</td>
    </tr>
    <tr>
        <td>Division:</td>
        <td>{{ $newTicketDetails['customer_division'] }}</td>
        <td>District:</td>
        <td>{{ $newTicketDetails['customer_district'] }}</td>
    </tr>
    <tr>
        <td>Address:</td>
        <td>{{ $newTicketDetails['customer_address'] }}</td>
        <td>Profession:</td>
        <td>{{ $newTicketDetails['customer_profession'] }}</td>
    </tr>
    <tr>
        <td>Department:</td>
        <td>{{ $newTicketDetails['department'] }}</td>
        <td>Call Remarks:</td>
        <td>{{ $newTicketDetails['call_remark'] }}</td>
    </tr>
    <tr>
        <td>Query Type:</td>
        <td>{{ $newTicketDetails['query_type'] }}</td>
        <td>Complain Type:</td>
        <td>{{ $newTicketDetails['complain_type'] }}</td>
    </tr>
    <tr>
        <td>Agent Name:</td>
        <td>{{ $newTicketDetails['agent_name'] }}</td>
        <td>Assigned Person:</td>
        <td>{{ $newTicketDetails['assigned_person'] }}</td>
    </tr>
    <tr>
        <td>Problem Details:</td>
        <td colspan="3">{{ $newTicketDetails['verbatim'] }}</td>
    </tr>
</table>

</body>
</html>
