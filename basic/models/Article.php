<?php

namespace app\models;

use Yii;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "article".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $description
 * @property string|null $content
 * @property string|null $date
 * @property string|null $image
 * @property int|null $viewed
 * @property int|null $user_id
 * @property int|null $status
 * @property int|null $category_id
 *
 * @property ArticleTag[] $articleTags
 * @property Comment[] $comments
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * @var mixed|null
     */
    public mixed $category;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['description', 'content', 'title'], 'string'],
            [['date'], 'date', 'format' => 'php:Y-m-d'],
            [['viewed', 'user_id', 'status', 'category_id'], 'integer'],
            [['image'], 'string'],
            [['date'], 'default', 'value' => date('Y-m-d')],
            [['title'], 'string', 'max' => 255]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'content' => 'Content',
            'date' => 'Date',
            'image' => 'Image',
            'viewed' => 'Viewed',
            'user_id' => 'User ID',
            'status' => 'Status',
            'category_id' => 'Category ID',
        ];
    }

    public function saveArticle()
    {
        $this->user_id = Yii::$app->user->id;
        return $this->save(false);
    }

    public function saveImage($fileName)
    {
        $this->image = $fileName;
        return $this->save(false);
    }

    public function getImage(): string
    {
        return ($this->image) ? '/uploads/' . $this->image : 'no-image.png';
    }

    public function deleteImage()
    {
        $imageUploadmodel = new ImageUpLoad();
        $imageUploadmodel->deleteCurrentImage($this->image);
    }

    public function beforeDelete()
    {
        $this->deleteImage();
        return parent::beforeDelete(); // TODO: Change the autogenerated stub
    }

    public function getCategory(): \yii\db\ActiveQuery
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    public function saveCategory($category_id)
    {
        $category = Category::findOne($category_id);
        if ($category != null) {
            $this->link('category', $category);
            return true;
        } else return false;
    }

    public function getTags()
    {
        return $this->hasMany(Tag::className(), ['id' => 'tag_id'])
            ->viaTable('article_tag', ['article_id' => 'id']);
    }

    public function getSelectedTags()
    {
        $selectedIds = $this->getTags()->select('id')->asArray()->all();
        return ArrayHelper::getColumn($selectedIds, 'id');
    }

    public function saveTags($tags)
    {
        if (is_array($tags)) {
            $this->clearCurrentTags();

            foreach ($tags as $tag_id) {
                $tag = Tag::findOne($tag_id);
                $this->link('tags', $tag);
            }
        }
    }

    public function clearCurrentTags()
    {
        ArticleTag::deleteAll(['article_id' => $this->id]);
    }

    public function getDate()
    {
        return Yii::$app->formatter->asDate($this->date);
    }

    public static function getAll()
    {
        $query = Article::find();

        $count = $query->count();

        $pagination = new Pagination(['totalCount' => $count, 'pageSize' => 1]);

        $articles = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        $data['pagination'] = $pagination;
        $data ['articles'] = $articles;
        return $data;
    }

    public static function getPopular()
    {
        return Article::find()->orderBy('viewed desc')->limit(3)->all();
    }

    public static function getRecent()
    {
        return Article::find()->orderBy('date asc')->limit(4)->all();
    }

    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['article_id' => 'id']);
    }

    public function getArticleComments()
    {
        Yii::$app->getSession()->getFlash('comment', 'Your comment wil be added soon!');
        return $this->getComments()->where(['status' => 1])->all();
    }

    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function viewedCounter()
    {
        $this->viewed += 1;
        return $this->save(false);
    }
}
