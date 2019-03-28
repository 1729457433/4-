<?php
/**
 *  小朋友过桥问题：在一个夜黑风高的晚上，有n（n <= 50）个小朋友在桥的这边，现在他们需要过桥，但是由于桥很窄，每次只允许不大于两人通过，他们只有一个手电筒，所以每次过桥的两个  *  人需要把手电筒带回来，i号小朋友过桥的时间为T[i]，两个人过桥的总时间为二者中时间长者。问所有小朋友过桥的总时间最短是多少。
 * @param $arr array  待过桥人员数组
 * @param $arr2 array 以过桥人员数组
 * @param $time int  已用时间
 * @return int|mixed
 */
function minTime($arr,$arr2=[],$time=0){
    if(count($arr)<=2) return $time + max($arr);
    if(count($arr2)==0){
        $time+=$arr[1];
        array_push($arr2,$arr[1]);
        sort($arr2);
        $time+=min($arr);
        array_splice($arr,1,1);
        return minTime($arr,$arr2,$time);
    }
    if(max($arr)/(max($arr)+min($arr)) >= (max($arr)+$arr[count($arr)-2]-min($arr2))/(max($arr)+min($arr2)) ){
        $time+=max($arr);
        array_push($arr2,$arr[count($arr)-1]);
        sort($arr2);
        $time+=min($arr);
        array_splice($arr,count($arr)-1,1);
    }else{
        $time+=max($arr);
        array_push($arr2,$arr[count($arr)-1],$arr[count($arr)-2]);
        sort($arr2);
        array_splice($arr,count($arr)-2,2);
        $time+=min($arr2);
        array_push($arr,min($arr2));
        sort($arr);
        array_splice($arr2,0,1);
    }
    return minTime($arr,$arr2,$time);
}


$time=minTime([1,1,10,10]);
echo $time;
