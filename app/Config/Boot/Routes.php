$routes->post('rating/save', 'RatingController::save');
$routes->get('admin/ratings', 'RatingController::viewRatings');