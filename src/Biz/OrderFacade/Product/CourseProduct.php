<?php

namespace Biz\OrderFacade\Product;

use AppBundle\Common\ArrayToolkit;

class CourseProduct extends Product
{
    const TYPE = 'course';
    private $params = array();

    public function init(array $params)
    {
        $params['showTemplate'] = 'order/show/course-item.html.twig';
        $course = $this->getCourseService()->getCourse($params['targetId']);
        $params['title'] = $course['title'];
        $params['courseSet'] = $this->getCourseSetService()->getCourseSet($course['courseSetId']);
        $params['price'] = $course['price'];
        
        foreach($params as $key => $param)
        {
            $this->$key = $param;
        }

    }

    public function validate()
    {

    }

    /**
     * @return CourseService
     */
    protected function getCourseService()
    {
        return $this->biz->service('Course:CourseService');
    }

    protected function getCourseSetService()
    {
        return $this->biz->service('Course:CourseSetService');
    }
}

