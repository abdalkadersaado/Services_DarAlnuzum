<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('permissions')->truncate();


        // MAIN
        $manageMain = Permission::create(['name' => 'main', 'display_name_en' => 'Main', 'description_en' => 'Administrator Dashboard', 'display_name' => 'الرئيسية', 'description' => 'الرئيسية', 'route' => 'index', 'module' => 'index', 'as' => 'index', 'icon' => 'fa fa-home', 'parent' => '0', 'parent_original' => '0', 'sidebar_link' => '1', 'appear' => '1', 'ordering' => '1',]);
        $manageMain->parent_show = $manageMain->id;
        $manageMain->save();

        // POSTS
        $managePosts = Permission::create(['name' => 'manage_posts', 'display_name_en' => 'Posts', 'display_name' => 'ادارة المقالات', 'route' => 'posts', 'module' => 'posts', 'as' => 'posts.index', 'icon' => 'fas fa-newspaper', 'parent' => '0', 'parent_original' => '0', 'appear' => '1', 'ordering' => '5',]);
        $managePosts->parent_show = $managePosts->id;
        $managePosts->save();
        $showPosts = Permission::create(['name' => 'show_posts', 'display_name_en' => 'Posts', 'display_name' => 'ادارة المقالات', 'route' => 'posts', 'module' => 'posts', 'as' => 'posts.index', 'icon' => 'fas fa-newspaper', 'parent' => $managePosts->id, 'parent_show' => $managePosts->id, 'parent_original' => $managePosts->id, 'appear' => '1', 'ordering' => '0',]);
        $createPosts = Permission::create(['name' => 'create_posts', 'display_name' => 'انشاء مقال', 'display_name_en' => 'Create Post', 'route' => 'posts/create', 'module' => 'posts', 'as' => 'posts.create', 'icon' => null, 'parent' => $managePosts->id, 'parent_show' => $managePosts->id, 'parent_original' => $managePosts->id, 'appear' => '0', 'ordering' => '0',]);
        $displayPost = Permission::create(['name' => 'display_posts', 'display_name' => 'عرض مقال', 'display_name_en' => 'Show Post', 'route' => 'posts/{posts}', 'module' => 'posts', 'as' => 'posts.show', 'icon' => null, 'parent' => $managePosts->id, 'parent_show' => $managePosts->id, 'parent_original' => $managePosts->id, 'appear' => '0', 'ordering' => '0',]);
        $updatePosts = Permission::create(['name' => 'update_posts', 'display_name' => 'تعديا مقال', 'display_name_en' => 'Update Post', 'route' => 'posts/{posts}/edit', 'module' => 'posts', 'as' => 'posts.edit', 'icon' => null, 'parent' => $managePosts->id, 'parent_show' => $managePosts->id, 'parent_original' => $managePosts->id, 'appear' => '0', 'ordering' => '0',]);
        $destroyPosts = Permission::create(['name' => 'delete_posts', 'display_name' => 'حذف المقال', 'display_name_en' => 'Delete Post', 'route' => 'posts/{posts}', 'module' => 'posts', 'as' => 'posts.delete', 'icon' => null, 'parent' => $managePosts->id, 'parent_show' => $managePosts->id, 'parent_original' => $managePosts->id, 'appear' => '0', 'ordering' => '0',]);

        // POSTS COMMENTS
        $manageComments = Permission::create(['name' => 'manage_post_comments', 'display_name' => 'ادارة التعليقات', 'display_name_en' => 'Comments', 'route' => 'post_comments', 'module' => 'post_comments', 'as' => 'post_comments.index', 'icon' => 'fas fa-comments-alt', 'parent' => $managePosts->id, 'parent_original' => '0', 'appear' => '0', 'ordering' => '10',]);
        $manageComments->parent_show = $manageComments->id;
        $manageComments->save();
        $showComments = Permission::create(['name' => 'show_post_comments', 'display_name' => 'ادارة التعليقات', 'display_name_en' => 'Comments', 'route' => 'post_comments', 'module' => 'post_comments', 'as' => 'post_comments.index', 'icon' => 'fas fa-comments-alt', 'parent' => $managePosts->id, 'parent_show' => $managePosts->id, 'parent_original' => $manageComments->id, 'appear' => '1', 'ordering' => '0',]);
        $createComments = Permission::create(['name' => 'create_post_comments', 'display_name' => 'انشاء تعليق', 'display_name_en' => 'Create Comment', 'route' => 'post_comments/create', 'module' => 'post_comments', 'as' => 'post_comments.create', 'icon' => null, 'parent' => $managePosts->id, 'parent_show' => $managePosts->id, 'parent_original' => $manageComments->id, 'appear' => '0', 'ordering' => '0',]);
        $updateComments = Permission::create(['name' => 'update_post_comments', 'display_name' => 'تعديل تعليق', 'display_name_en' => 'Update Comment', 'route' => 'post_comments/{post_comments}/edit', 'module' => 'post_comments', 'as' => 'post_comments.edit', 'icon' => null, 'parent' => $managePosts->id, 'parent_show' => $managePosts->id, 'parent_original' => $manageComments->id, 'appear' => '0', 'ordering' => '0',]);
        $destroyComments = Permission::create(['name' => 'delete_post_comments', 'display_name' => 'حذف تعليق', 'display_name_en' => 'Update Comment', 'route' => 'post_comments/{post_comments}', 'module' => 'post_comments', 'as' => 'post_comments.delete', 'icon' => null, 'parent' => $managePosts->id, 'parent_show' => $managePosts->id, 'parent_original' => $manageComments->id, 'appear' => '0', 'ordering' => '0',]);

        // POSTS CATEGORIES
        $managePostCategories = Permission::create(['name' => 'manage_post_categories', 'display_name' => 'ادارة الاقسام', 'display_name_en' => 'categories', 'route' => 'post_categories', 'module' => 'post_categories', 'as' => 'post_categories.index', 'icon' => 'fas fa-file-archive', 'parent' => $managePosts->id, 'parent_original' => '0', 'appear' => '0', 'ordering' => '15',]);
        $managePostCategories->parent_show = $managePostCategories->id;
        $managePostCategories->save();
        $showPostCategories = Permission::create(['name' => 'show_post_categories', 'display_name' => 'ادارة الاقسام', 'display_name_en' => 'Categories', 'route' => 'post_categories', 'module' => 'post_categories', 'as' => 'post_categories.index', 'icon' => 'fas fa-file-archive', 'parent' => $managePosts->id, 'parent_show' => $managePosts->id, 'parent_original' => $managePostCategories->id, 'appear' => '1', 'ordering' => '0',]);
        $createPostCategories = Permission::create(['name' => 'create_post_categories', 'display_name' => 'انشاء قسم', 'display_name_en' => 'Create category', 'route' => 'post_categories/create', 'module' => 'post_categories', 'as' => 'post_categories.create', 'icon' => null, 'parent' => $managePosts->id, 'parent_show' => $managePosts->id, 'parent_original' => $managePostCategories->id, 'appear' => '0', 'ordering' => '0',]);
        $updatePostCategories = Permission::create(['name' => 'update_post_categories', 'display_name' => 'تعديل قسم', 'display_name_en' => 'Create category', 'route' => 'post_categories/{post_categories}/edit', 'module' => 'post_categories', 'as' => 'post_categories.edit', 'icon' => null, 'parent' => $managePosts->id, 'parent_show' => $managePosts->id, 'parent_original' => $managePostCategories->id, 'appear' => '0', 'ordering' => '0',]);
        $destroyPostCategories = Permission::create(['name' => 'delete_post_categories', 'display_name' => 'حذف قسم', 'display_name_en' => 'Create category', 'route' => 'post_categories/{post_categories}', 'module' => 'post_categories', 'as' => 'post_categories.delete', 'icon' => null, 'parent' => $managePosts->id, 'parent_show' => $managePosts->id, 'parent_original' => $managePostCategories->id, 'appear' => '0', 'ordering' => '0',]);

        // POSTS TAGS
        $managePostTags = Permission::create(['name' => 'manage_post_tags', 'display_name' => 'التاغات', 'display_name_en' => 'Tags', 'route' => 'post_tags', 'module' => 'post_tags', 'as' => 'post_tags.index', 'icon' => 'fas fa-tags', 'parent' => $managePosts->id, 'parent_original' => '0', 'appear' => '0', 'ordering' => '16',]);
        $managePostTags->parent_show = $managePostTags->id;
        $managePostTags->save();
        $showPostTags = Permission::create(['name' => 'show_post_tags', 'display_name' => 'التاغات', 'display_name_en' => 'Tags', 'route' => 'post_tags', 'module' => 'post_tags', 'as' => 'post_tags.index', 'icon' => 'fas fa-tags', 'parent' => $managePosts->id, 'parent_show' => $managePosts->id, 'parent_original' => $managePostTags->id, 'appear' => '1', 'ordering' => '0',]);
        $createPostTags = Permission::create(['name' => 'create_post_tags', 'display_name' => 'انشاء تاغ', 'display_name_en' => 'Create Tag', 'route' => 'post_tags/create', 'module' => 'post_tags', 'as' => 'post_tags.create', 'icon' => null, 'parent' => $managePosts->id, 'parent_show' => $managePosts->id, 'parent_original' => $managePostTags->id, 'appear' => '0', 'ordering' => '0',]);
        $updatePostTags = Permission::create(['name' => 'update_post_tags', 'display_name' => 'تعديل تاغ', 'display_name_en' => 'Update Tag', 'route' => 'post_tags/{post_tags}/edit', 'module' => 'post_tags', 'as' => 'post_tags.edit', 'icon' => null, 'parent' => $managePosts->id, 'parent_show' => $managePosts->id, 'parent_original' => $managePostTags->id, 'appear' => '0', 'ordering' => '0',]);
        $destroyPostTags = Permission::create(['name' => 'delete_post_tags', 'display_name' => 'حذف تاغ', 'display_name_en' => 'Delete Tag', 'route' => 'post_tags/{post_tags}', 'module' => 'post_tags', 'as' => 'post_tags.delete', 'icon' => null, 'parent' => $managePosts->id, 'parent_show' => $managePosts->id, 'parent_original' => $managePostTags->id, 'appear' => '0', 'ordering' => '0',]);

        // PAGES
        $managePages = Permission::create(['name' => 'manage_pages', 'display_name' => 'الصفحات', 'display_name_en' => 'Pages', 'route' => 'pages', 'module' => 'pages', 'as' => 'pages.index', 'icon' => 'fas fa-file', 'parent' => '0', 'parent_original' => '0', 'appear' => '1', 'ordering' => '20',]);
        $managePages->parent_show = $managePages->id;
        $managePages->save();
        $showPages = Permission::create(['name' => 'show_pages', 'display_name' => 'الصفحات', 'display_name_en' => 'Pages', 'route' => 'pages', 'module' => 'pages', 'as' => 'pages.index', 'icon' => 'fas fa-file', 'parent' => $managePages->id, 'parent_show' => $managePages->id, 'parent_original' => $managePages->id, 'appear' => '1', 'ordering' => '0',]);
        $createPages = Permission::create(['name' => 'create_pages', 'display_name' => 'انشاء صفحة', 'display_name_en' => 'Create Page', 'route' => 'pages/create', 'module' => 'pages', 'as' => 'pages.create', 'icon' => null, 'parent' => $managePages->id, 'parent_show' => $managePages->id, 'parent_original' => $managePages->id, 'appear' => '0', 'ordering' => '0',]);
        $displayPages = Permission::create(['name' => 'display_pages', 'display_name' => 'عرض صفحة', 'display_name_en' => 'Show Page', 'route' => 'pages/{pages}', 'module' => 'pages', 'as' => 'pages.show', 'icon' => null, 'parent' => $managePages->id, 'parent_show' => $managePages->id, 'parent_original' => $managePages->id, 'appear' => '0', 'ordering' => '0',]);
        $updatePages = Permission::create(['name' => 'update_pages', 'display_name' => 'تعديل صفحة', 'display_name_en' => 'Update Page', 'route' => 'pages/{pages}/edit', 'module' => 'pages', 'as' => 'pages.edit', 'icon' => null, 'parent' => $managePages->id, 'parent_show' => $managePages->id, 'parent_original' => $managePages->id, 'appear' => '0', 'ordering' => '0',]);
        $destroyPages = Permission::create(['name' => 'delete_pages', 'display_name' => 'حذف صفحة', 'display_name_en' => 'Delete Page', 'route' => 'pages/{pages}', 'module' => 'pages', 'as' => 'pages.delete', 'icon' => null, 'parent' => $managePages->id, 'parent_show' => $managePages->id, 'parent_original' => $managePages->id, 'appear' => '0', 'ordering' => '0',]);

        $manageContactUs = Permission::create(['name' => 'manage_contact_us', 'display_name' => 'تواصل معنا', 'display_name_en' => 'Contact Us', 'route' => 'contact_us', 'module' => 'contact_us', 'as' => 'contact_us.index', 'icon' => 'fas fa-envelope', 'parent' => '0', 'parent_original' => '0', 'appear' => '1', 'ordering' => '20',]);
        $manageContactUs->parent_show = $manageContactUs->id;
        $manageContactUs->save();
        $showContactUs = Permission::create(['name' => 'show_contact_us', 'display_name' => 'تواصل معنا', 'display_name_en' => 'Contact Us', 'route' => 'contact_us', 'module' => 'contact_us', 'as' => 'contact_us.index', 'icon' => 'fas fa-envelope', 'parent' => $manageContactUs->id, 'parent_show' => $manageContactUs->id, 'parent_original' => $manageContactUs->id, 'appear' => '1', 'ordering' => '0',]);
        $displayContactUs = Permission::create(['name' => 'display_contact_us', 'display_name' => 'عرض الرسائل', 'display_name_en' => 'Display Message', 'route' => 'contact_us/{contact_us}', 'module' => 'contact_us', 'as' => 'contact_us.show', 'icon' => null, 'parent' => $manageContactUs->id, 'parent_show' => $manageContactUs->id, 'parent_original' => $manageContactUs->id, 'appear' => '0', 'ordering' => '0',]);
        $updateContactUs = Permission::create(['name' => 'update_contact_us', 'display_name' => 'تعديل الرسائل', 'display_name_en' => 'Update Message', 'route' => 'contact_us/{contact_us}/edit', 'module' => 'contact_us', 'as' => 'contact_us.edit', 'icon' => null, 'parent' => $manageContactUs->id, 'parent_show' => $manageContactUs->id, 'parent_original' => $manageContactUs->id, 'appear' => '0', 'ordering' => '0',]);
        $destroyContactUs = Permission::create(['name' => 'delete_contact_us', 'display_name' => 'حذف الرسائل', 'display_name_en' => 'Delete Message', 'route' => 'contact_us/{contact_us}', 'module' => 'contact_us', 'as' => 'contact_us.delete', 'icon' => null, 'parent' => $manageContactUs->id, 'parent_show' => $manageContactUs->id, 'parent_original' => $manageContactUs->id, 'appear' => '0', 'ordering' => '0',]);

        // USERS
        $manageUsers = Permission::create(['name' => 'manage_users', 'display_name' => 'المستخدمين', 'display_name_en' => 'Users', 'route' => 'users', 'module' => 'users', 'as' => 'users.index', 'icon' => 'fas fa-user', 'parent' => '0', 'parent_original' => '0', 'appear' => '1', 'ordering' => '20',]);
        $manageUsers->parent_show = $manageUsers->id;
        $manageUsers->save();
        $showUsers = Permission::create(['name' => 'show_users', 'display_name' => 'المستخدمين', 'display_name_en' => 'Users', 'route' => 'users', 'module' => 'users', 'as' => 'users.index', 'icon' => 'fas fa-user', 'parent' => $manageUsers->id, 'parent_show' => $manageUsers->id, 'parent_original' => $manageUsers->id, 'appear' => '1', 'ordering' => '0',]);
        $createUsers = Permission::create(['name' => 'create_users', 'display_name' => 'انشاء مستخدم', 'display_name_en' => 'Create User', 'route' => 'users/create', 'module' => 'users', 'as' => 'users.create', 'icon' => null, 'parent' => $manageUsers->id, 'parent_show' => $manageUsers->id, 'parent_original' => $manageUsers->id, 'appear' => '0', 'ordering' => '0',]);
        $displayUsers = Permission::create(['name' => 'display_users', 'display_name' => 'عرض مستخدم', 'display_name_en' => 'Show User', 'route' => 'users/{users}', 'module' => 'users', 'as' => 'users.show', 'icon' => null, 'parent' => $manageUsers->id, 'parent_show' => $manageUsers->id, 'parent_original' => $manageUsers->id, 'appear' => '0', 'ordering' => '0',]);
        $updateUsers = Permission::create(['name' => 'update_users', 'display_name' => 'تعديل مستخدم', 'display_name_en' => 'Update User', 'route' => 'users/{users}/edit', 'module' => 'users', 'as' => 'users.edit', 'icon' => null, 'parent' => $manageUsers->id, 'parent_show' => $manageUsers->id, 'parent_original' => $manageUsers->id, 'appear' => '0', 'ordering' => '0',]);
        $destroyUsers = Permission::create(['name' => 'delete_users', 'display_name' => 'حذف مستخدم', 'display_name_en' => 'Delete User', 'route' => 'users/{users}', 'module' => 'users', 'as' => 'users.delete', 'icon' => null, 'parent' => $manageUsers->id, 'parent_show' => $manageUsers->id, 'parent_original' => $manageUsers->id, 'appear' => '0', 'ordering' => '0',]);

        // ROLES
        $manageRoles = Permission::create(['name' => 'manage_roles', 'display_name' => 'ادارة الادوار', 'display_name_en' => 'Roles', 'route' => 'roles', 'module' => 'roles', 'as' => 'roles.index', 'icon' => 'fas fa-user', 'parent' => '0', 'parent_original' => '0', 'appear' => '1', 'ordering' => '25',]);
        $manageRoles->parent_show = $manageRoles->id;
        $manageRoles->save();
        $showRoles = Permission::create(['name' => 'show_roles', 'display_name' => 'ادارة الادوار', 'display_name_en' => 'Roles', 'route' => 'roles', 'module' => 'roles', 'as' => 'roles.index', 'icon' => 'fas fa-user', 'parent' => $manageRoles->id, 'parent_show' => $manageRoles->id, 'parent_original' => $manageRoles->id, 'appear' => '1', 'ordering' => '0',]);
        $createRoles = Permission::create(['name' => 'create_roles', 'display_name' => 'انشاء دور', 'display_name_en' => 'Create Role', 'route' => 'roles/create', 'module' => 'roles', 'as' => 'roles.create', 'icon' => null, 'parent' => $manageRoles->id, 'parent_show' => $manageRoles->id, 'parent_original' => $manageRoles->id, 'appear' => '0', 'ordering' => '0',]);
        $displayRoles = Permission::create(['name' => 'display_roles', 'display_name' => 'عرض دور', 'display_name_en' => 'Show Role', 'route' => 'roles/{roles}', 'module' => 'roles', 'as' => 'roles.show', 'icon' => null, 'parent' => $manageRoles->id, 'parent_show' => $manageRoles->id, 'parent_original' => $manageRoles->id, 'appear' => '0', 'ordering' => '0',]);
        $updateRoles = Permission::create(['name' => 'update_roles', 'display_name' => 'تعديل دور', 'display_name_en' => 'Update Role', 'route' => 'roles/{roles}/edit', 'module' => 'roles', 'as' => 'roles.edit', 'icon' => null, 'parent' => $manageRoles->id, 'parent_show' => $manageRoles->id, 'parent_original' => $manageRoles->id, 'appear' => '0', 'ordering' => '0',]);
        $destroyRoles = Permission::create(['name' => 'delete_roles', 'display_name' => 'حذف دور', 'display_name_en' => 'Delete Role', 'route' => 'roles/{roles}', 'module' => 'roles', 'as' => 'roles.delete', 'icon' => null, 'parent' => $manageRoles->id, 'parent_show' => $manageRoles->id, 'parent_original' => $manageRoles->id, 'appear' => '0', 'ordering' => '0',]);

        // PERMISSIONS
        $managePermissions = Permission::create(['name' => 'manage_permissions', 'display_name' => 'ادارة الصلاحيات', 'display_name_en' => 'Permissions', 'route' => 'permissions', 'module' => 'permissions', 'as' => 'permissions.index', 'icon' => 'fas fa-user', 'parent' => '0', 'parent_original' => '0', 'appear' => '1', 'ordering' => '30',]);
        $managePermissions->parent_show = $managePermissions->id;
        $managePermissions->save();
        $showPermissions = Permission::create(['name' => 'show_permissions', 'display_name' => 'ادارة الصلاحيات', 'display_name_en' => 'permissions', 'route' => 'permissions', 'module' => 'permissions', 'as' => 'permissions.index', 'icon' => 'fas fa-user', 'parent' => $managePermissions->id, 'parent_show' => $managePermissions->id, 'parent_original' => $managePermissions->id, 'appear' => '1', 'ordering' => '0',]);
        $createPermissions = Permission::create(['name' => 'create_permissions', 'display_name' => 'انشاء صلاحية', 'display_name_en' => 'Create Permission', 'route' => 'permissions/create', 'module' => 'permissions', 'as' => 'permissions.create', 'icon' => null, 'parent' => $managePermissions->id, 'parent_show' => $managePermissions->id, 'parent_original' => $managePermissions->id, 'appear' => '0', 'ordering' => '0',]);
        $displayPermissions = Permission::create(['name' => 'display_permissions', 'display_name' => 'عرض صلاحية', 'display_name_en' => 'Show Permission', 'route' => 'permissions/{permissions}', 'module' => 'permissions', 'as' => 'permissions.show', 'icon' => null, 'parent' => $managePermissions->id, 'parent_show' => $managePermissions->id, 'parent_original' => $managePermissions->id, 'appear' => '0', 'ordering' => '0',]);
        $updatePermissions = Permission::create(['name' => 'update_permissions', 'display_name' => 'تعديل صلاحية', 'display_name_en' => 'Update Permission', 'route' => 'permissions/{permissions}/edit', 'module' => 'permissions', 'as' => 'permissions.edit', 'icon' => null, 'parent' => $managePermissions->id, 'parent_show' => $managePermissions->id, 'parent_original' => $managePermissions->id, 'appear' => '0', 'ordering' => '0',]);
        $destroyPermissions = Permission::create(['name' => 'delete_permissions', 'display_name' => 'حذف صلاحية', 'display_name_en' => 'Delete Permission', 'route' => 'permissions/{permissions}', 'module' => 'permissions', 'as' => 'permissions.delete', 'icon' => null, 'parent' => $managePermissions->id, 'parent_show' => $managePermissions->id, 'parent_original' => $managePermissions->id, 'appear' => '0', 'ordering' => '0',]);


        // EDITORS
        // SUPERVISORS
        $manageSupervisors = Permission::create(['name' => 'manage_supervisors', 'display_name' => 'المشرفون', 'display_name_en' => 'Supervisors', 'route' => 'supervisor', 'module' => 'supervisor', 'as' => 'supervisor.index', 'icon' => 'fas fa-user-shield', 'parent' => '0', 'parent_original' => '0', 'appear' => '0', 'ordering' => '700', 'sidebar_link' => '0']);
        $manageSupervisors->parent_show = $manageSupervisors->id;
        $manageSupervisors->save();
        $showSupervisors = Permission::create(['name' => 'show_supervisors', 'display_name' => 'المشرفون', 'display_name_en' => 'Supervisors', 'route' => 'supervisor', 'module' => 'supervisor', 'as' => 'supervisor.index', 'icon' => 'fas fa-user-shield', 'parent' => $manageSupervisors->id, 'parent_show' => $manageSupervisors->id, 'parent_original' => $manageSupervisors->id, 'appear' => '1', 'ordering' => '0', 'sidebar_link' => '0']);
        $createSupervisors = Permission::create(['name' => 'create_supervisors', 'display_name' => 'انشاء مشرف', 'display_name_en' => 'Create Supervisor', 'route' => 'supervisor/create', 'module' => 'supervisor', 'as' => 'supervisor.create', 'icon' => null, 'parent' => $manageSupervisors->id, 'parent_show' => $manageSupervisors->id, 'parent_original' => $manageSupervisors->id, 'appear' => '0', 'ordering' => '0', 'sidebar_link' => '0']);
        $displaySupervisors = Permission::create(['name' => 'display_supervisors', 'display_name' => 'عرض مشرف', 'display_name_en' => 'Show Supervisor', 'route' => 'supervisor/{supervisor}', 'module' => 'supervisor', 'as' => 'supervisor.show', 'icon' => null, 'parent' => $manageSupervisors->id, 'parent_show' => $manageSupervisors->id, 'parent_original' => $manageSupervisors->id, 'appear' => '0', 'ordering' => '0', 'sidebar_link' => '0']);
        $updateSupervisors = Permission::create(['name' => 'update_supervisors', 'display_name' => 'تعديل مشرف', 'display_name_en' => 'Update Supervisor', 'route' => 'supervisor/{supervisor}/edit', 'module' => 'supervisor', 'as' => 'supervisor.edit', 'icon' => null, 'parent' => $manageSupervisors->id, 'parent_show' => $manageSupervisors->id, 'parent_original' => $manageSupervisors->id, 'appear' => '0', 'ordering' => '0', 'sidebar_link' => '0']);
        $destroySupervisors = Permission::create(['name' => 'delete_supervisors', 'display_name' => 'حذف مشرف', 'display_name_en' => 'Delete Supervisor', 'route' => 'supervisor/{supervisor}', 'module' => 'supervisor', 'as' => 'supervisor.delete', 'icon' => null, 'parent' => $manageSupervisors->id, 'parent_show' => $manageSupervisors->id, 'parent_original' => $manageSupervisors->id, 'appear' => '0', 'ordering' => '0', 'sidebar_link' => '0']);

        // SETTINGS
        $manageSettings = Permission::create(['name' => 'manage_settings', 'display_name' => 'الاعدادات', 'display_name_en' => 'Settings', 'route' => 'settings', 'module' => 'settings', 'as' => 'settings.index', 'icon' => 'fas fa-cog', 'parent' => '0', 'parent_original' => '0', 'appear' => '0', 'ordering' => '600', 'sidebar_link' => '0']);
        $manageSettings->parent_show = $manageSettings->id;
        $manageSettings->save();
        $showSettings = Permission::create(['name' => 'show_settings', 'display_name' => 'الاعدادات', 'display_name_en' => 'Settings', 'route' => 'settings', 'module' => 'settings', 'as' => 'settings.index', 'icon' => 'fas fa-cog', 'parent' => $manageSettings->id, 'parent_show' => $manageSettings->id, 'parent_original' => $manageSettings->id, 'appear' => '1', 'ordering' => '0', 'sidebar_link' => '0']);
        $createSettings = Permission::create(['name' => 'create_settings', 'display_name' => 'انشاء الاعدادات', 'display_name_en' => 'Create Settings', 'route' => 'settings/create', 'module' => 'settings', 'as' => 'settings.create', 'icon' => null, 'parent' => $manageSettings->id, 'parent_show' => $manageSettings->id, 'parent_original' => $manageSettings->id, 'appear' => '0', 'ordering' => '0', 'sidebar_link' => '0']);
        $displaySettings = Permission::create(['name' => 'display_settings', 'display_name' => 'عرض الاعدادات', 'display_name_en' => 'Show Settings', 'route' => 'settings/{settings}', 'module' => 'settings', 'as' => 'settings.show', 'icon' => null, 'parent' => $manageSettings->id, 'parent_show' => $manageSettings->id, 'parent_original' => $manageSettings->id, 'appear' => '0', 'ordering' => '0', 'sidebar_link' => '0']);
        $updateSettings = Permission::create(['name' => 'update_settings', 'display_name' => 'تعديل الاعدادات', 'display_name_en' => 'Update Settings', 'route' => 'settings/{settings}/edit', 'module' => 'settings', 'as' => 'settings.edit', 'icon' => null, 'parent' => $manageSettings->id, 'parent_show' => $manageSettings->id, 'parent_original' => $manageSettings->id, 'appear' => '0', 'ordering' => '0', 'sidebar_link' => '0']);
        $destroySettings = Permission::create(['name' => 'delete_settings', 'display_name' => 'حذف الاعدادات', 'display_name_en' => 'Delete Settings', 'route' => 'settings/{settings}', 'module' => 'settings', 'as' => 'settings.delete', 'icon' => null, 'parent' => $manageSettings->id, 'parent_show' => $manageSettings->id, 'parent_original' => $manageSettings->id, 'appear' => '0', 'ordering' => '0', 'sidebar_link' => '0']);
    }
}
