import java.util.Scanner;
public class Palindrome{
    public static void main(String[] args) {

    Scanner input = new Scanner(System.in);

     int r,sum=0,temp; 

     System.out.print("Masukkan Bilangan: ");
     int angka=input.nextInt();   
     
  
    temp=angka;    
    while(angka>0){    
        r=angka%10;    
        sum=(sum*10)+r;    
        angka=angka/10;    
    }    
    if(temp==sum)    
    System.out.println(angka + " merupakan bilangan palindrome");    
    else    
    System.out.println(angka + " tidak merupakan bilangan palindrome");    
    }  
}