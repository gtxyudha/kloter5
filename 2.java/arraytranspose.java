 public class arraytranspose{
     public static void main(String args[])
    {

        final int[][] original = new int[][] { { 1, 2, 3 }, { 1, 2, 3}, { 1, 2, 3} };
        for (int i = 0; i < original.length; i++) {
            for (int j = 0; j < original[i].length; j++) {
                System.out.print(original[i][j] + " ");
            }
            System.out.print("\n");
        }
        System.out.print("\n\n matrix transpose:\n");
        // transpose
        if (original.length > 0) {
            for (int i = 0; i < original[0].length; i++) {
                for (int j = 0; j < original.length; j++) {
                    System.out.print(original[j][i] + " ");
                }
                System.out.print("\n");
            }
        }
    }
}