<?php
	include 'views/header.php';
	include 'views/activeTab_faq.php';
	
	include 'models/database.php';
	include 'models/faq.php';
	
	$faq_query = $_GET[ 'faq_query' ];
	
	switch ($faq_query) {
    case 1:
		$query = "SELECT
				h.name,type,price
			FROM
				rooms r, hotels h
			WHERE
				r.hotel_id=h.hotel_id
			ORDER BY
				h.name ASC,price ASC;";
        $results = DoQuery($query);
        include 'views/faq_view.php';
		break;
    case 2:
        $query = "SELECT
				hotels.name , hotel_phone.phone_number
			FROM
				hotels CROSS JOIN hotel_phone
			ON
				hotels.hotel_id = hotel_phone.hotel_id
			ORDER BY
				hotels.name ASC;";
        $results = DoQuery($query);
        include 'views/faq_view.php';
		break;
	case 3:
        $query = "SELECT
				hotels.name , count(*)
			FROM
				reservations CROSS JOIN hotels
			ON
				reservations.hotel_id = hotels.hotel_id
			GROUP BY
				hotels.hotel_id;";
        $results = DoQuery($query);
        include 'views/faq_view.php';
		break;
	case 4:
        $query = "SELECT
				hotels.name,hotels.city
			FROM
				hotels CROSS JOIN hotel_service
			ON
				hotels.hotel_id=hotel_service.hotel_id
			WHERE
				hotel_service.service='Spa';";
        $results = DoQuery($query);
        include 'views/faq_view.php';
		break;
	case 5:
        $query = "SELECT
				h.name
			FROM
				employees e, hotels h
			WHERE
				e.hotel_id = h.hotel_id
			GROUP BY
				h.name
			HAVING
				count(SSN) >= 3;";
        $results = DoQuery($query);
        include 'views/faq_view.php';
		break;
	case 6:
        $query = "SELECT
				h.name,h.city,h.rate
			FROM
				hotels h,hotel_service hs
			WHERE
				h.hotel_id=hs.hotel_id AND
				hs.service='Wifi' AND
				h.name
			IN (
				SELECT
					h.name
				FROM
					hotels h, hotel_service hs
				WHERE
					h.hotel_id=hs.hotel_id AND
					hs.service='Gym'
				);";
        $results = DoQuery($query);
        include 'views/faq_view.php';
		break;
	case 7:
        $query = "SELECT
				hotels.name, avg(salary),min(salary),max(salary)
			FROM 
				hotels CROSS JOIN employees
			ON
				hotels.hotel_id=employees.hotel_id
			GROUP BY
				hotels.name;";
        $results = DoQuery($query);
        include 'views/faq_view.php';
		break;
	case 8:
        $query = "SELECT
				hotels.name, hotels.rate, avg(price),min(price),max(price)
			FROM 
				hotels CROSS JOIN rooms
			ON
				hotels.hotel_id=rooms.hotel_id
			GROUP BY
				hotels.name;";
        $results = DoQuery($query);
        include 'views/faq_view.php';
		break;
	case 9:
        $query = "SELECT 
				hotels.name, hotels.rate
			FROM
				hotels
			WHERE
				hotels.construction_year>2000
			ORDER BY
				hotels.rate DESC;";
        $results = DoQuery($query);
        include 'views/faq_view.php';
		break;
	case 10:
        $query = "SELECT
				c.name, c.surname , count(*)
			FROM
				customers c, reservations r 
			WHERE
				r.customer_id=c.customer_id
			GROUP BY
				r.customer_id;";
        $results = DoQuery($query);
        include 'views/faq_view.php';
		break;
	default:
       echo "<div class='error'>Μη έγκυρο ερώτημα!</div>";
	}
	
	include 'views/footer.php';
?>