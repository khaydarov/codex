<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Set the routes. Each route must have a minimum of a name, a URI and a set of
 * defaults for the URI.
 */


$DIGIT = '\d+';
$STRING = '[-a-z\d]+';
$QUERY =  '[0-9a-zA-Zа-яёА-ЯЁ\s\-\.]+$';

Route::set('INDEX_PAGE', '')->defaults(array(
    'controller' => 'index',
    'action' => 'index',
));

Route::set('JOIN_PAGE', 'join')->defaults(array(
    'controller' => 'pages',
    'action' => 'index',
));

Route::set('TASK_LIST', 'task')->defaults(array(
    'controller' => 'pages',
    'action' => 'All',
));

Route::set('TASK_PAGE', 'task/<who>', array('who' => $STRING))->defaults(array(
    'controller' => 'pages',
    'action' => 'whoSet',
));


/**
 * Articles
 *
 * /articles/all        - show all articles     (page)
 * /articles/show/45    - show article #45      (page)
 * /articles/edit/45    - edit article #45      (page)
 * /articles/new        - new article           (page)
 * /articles/add        - add new article       (script)
 * /articles/del/45     - deleting article #45  (script)
 *
 * TODO merge 'new' and 'edit' pages
 *
 * @guryn
 */
Route::set('ARTICLES_AND_COMMENTS_SCRIPTS', 'articles/<action>(/<article_id>)',
        array( 'action' => 'add|del|new|show|all|edit', 'article_id' => $DIGIT ))->defaults(array(
    'controller' => 'articles',
    'action' => 'action'
));

/**
 * Comments
 *
 * /comment/add         - add comment       (script)
 * /comment/del/45      - del comment #45   (script)
 *
 * @guryn
 */
Route::set('ADD_COMMENT_SCRIPT', 'comment/<action>(/<comment_id>)',
        array( 'comment_id' => $DIGIT ))->defaults(array(
    'controller' => 'comment',
    'action' => 'action'
));

// Scripts for users

// Route::set('USER_PAGE', 'user/<action>(/<user_id>)', array('user_id' => $DIGIT, 'action' => $STRING))->defaults(array(
//     'controller' => 'users_index',
//     'action' => 'action'
// ));

Route::set('USER_PAGE', 'user(/<user_id>)', array('user_id' => $DIGIT))->defaults(array(

	'controller' => 'users_index',
	'action' => 'showUser'
));


// Design ?

Route::set('DESIGN_PREVIEW', 'design/<page>')->defaults(array(
    'controller' => 'index',
    'action' => 'designPreview'
));

// Auth

Route::set('AUTH', 'auth/<action>')->defaults(array(
    'controller' => 'auth',
    'action' => 'action'
));


// TAGS

Route::set('TAGS', 'tag(/<query>)', array('query' => $QUERY))->defaults(array(
    'controller' => 'articles_tags',
    'action' => 'search',
));
//Scripts for admin panel---------
//Articles
Route::set('ADMIN_ARTICLE_LIST', 'admin/article')->defaults(array(
    'controller' => 'admin',
    'action' => 'showAllArticles',
));

Route::set('ADMIN_DEL_ARTICLE', 'admin/article/delarticle/<article_id>', array('article_id' => $DIGIT))->defaults(array(
    'controller' => 'admin',
    'action' => 'delete'
));

Route::set('ADMIN_EDIT_ARTICLE', 'admin/article/editarticle/<article_id>', array('article_id' => $DIGIT))->defaults(array(
    'controller' => 'admin',
    'action' => 'edit'
));

Route::set('ADMIN_UPDATE_ARTICLE', 'admin/article/updatearticle/<article_id>', array('article_id' => $DIGIT))->defaults(array(
    'controller' => 'admin',
    'action' => 'update'
));
//Users
Route::set('ADMIN_USERS_LIST', 'admin/users')->defaults(array(
    'controller' => 'admin',
    'action' => 'showAllUsers',
));

Route::set('ADMIN_DEL_USER', 'admin/users/deluser/<user_id>', array('user_id' => $DIGIT))->defaults(array(
    'controller' => 'admin',
    'action' => 'deleteUser',
));

// - viz redaktor -



Route::set('EDITOR_LANDING', 'editor', array())->defaults(array(
    'controller' => 'editor',
    'action' => 'landing'
));


/** Sorry, Mark, I need this route. */
// Route::set('ARTICLE_EDITOR', 'editor', array())->defaults(array(
//     'controller' => 'articles_edit',
//     'action' => 'showNewEditor'
// ));
Route::set('ARTICLE_EDITOR_SAVE_IMG_FROM_FILE', 'saveimgfile', array())->defaults(array(
    'controller' => 'articles_edit',
    'action' => 'saveImgFromFile'
));
Route::set('ARTICLE_EDITOR_SAVE_IMG_FROM_URL', 'saveimgurl', array())->defaults(array(
    'controller' => 'articles_edit',
    'action' => 'saveImgFromUrl'
));

// Defaults
// Route::set('default', '(<controller>(/<action>(/<id>)))')
//     ->defaults(array(
//         'controller' => 'index',
//         'action'     => 'index',
//     ));
