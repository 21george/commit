<?php


require_once ("../models/Post.php");
require_once ("../models/User.php");
require_once ("../models/Comment.php");
require_once ("../models/Transaction.php");
require_once ("../models/Visitor.php");


$post = new Post;
$user = new user;
$comment = new Comment;
$payments = new Transaction;
$visitor = new Visitor;

$numPosts = $post->getPostCount();
$numUsers = $user->getUsersCount();
$numComments = $comment->getCommentsCount();
$numPayments = $payments->getTransactionsCount();
$totalPaid = $payments->getPaidSum();
$totalViews = $visitor->getViewCount();


$chart_data = array(
    $numUsers,
    $numPosts,
    $numPayments,
    $totalViews[0]->views,
    $numComments,
    $totalPaid[0]->paid
);

$chart_labels= array(
    "Users",
    "Posts",
    "Payments",
   "Total Views",
   "Number of Comments",
   "$ Paid"
);


?>